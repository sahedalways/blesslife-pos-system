<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\CmsPage;
use Modules\Cms\Entities\CmsSiteDetail;
use Modules\Cms\Notifications\NewLeadGeneratedNotification;
use Modules\Cms\Utils\CmsUtil;
use Notification;

class CmsController extends Controller
{
    /**
     * All Utils instance.
     */
    protected $cmsUtil;

    /**
     * Constructor
     *
     * @param  ProductUtils  $product
     * @return void
     */
    public function __construct(CmsUtil $cmsUtil)
    {
        $this->cmsUtil = $cmsUtil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $testimonials = $this->cmsUtil->getPageByType('testimonial');
        $page = $this->cmsUtil->getPageByLayout('home');
        $faqs = CmsSiteDetail::getValue('faqs');
        $statistics = CmsSiteDetail::getValue('statistics');

        return view('cms::frontend.pages.home')
            ->with(compact('testimonials', 'faqs', 'statistics', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('cms::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('cms::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBlogList()
    {
        $blogs = CmsPage::where('type', 'blog')
                    ->orderBy('priority', 'asc')
                    ->where('is_enabled', 1)
                    ->get();

        if ($blogs->isEmpty()) {
            $dummy = [];
            for ($i = 1; $i <= 6; $i++) {
                $blog = new \stdClass();
                $blog->id = $i;
                $blog->title = "Dummy Blog Title {$i}";
                $blog->slug = "dummy-blog-{$i}";
                $blog->feature_image_url = "https://picsum.photos/seed/blog{$i}/800/600";
                $blog->meta_description = "This is a dummy meta description for blog post {$i}. It is used for testing the blog listing page layout.";
                $blog->created_at = \Carbon\Carbon::now()->subDays($i);
                $dummy[] = $blog;
            }
            $blogs = collect($dummy);
        }

        return view('cms::frontend.blogs.index')
            ->with(compact('blogs'));
    }

    public function viewBlog(Request $request)
    {
        $id = $this->cmsUtil->findIdFromGivenUrl($request->url());

        $blog = CmsPage::where('type', 'blog')
                    ->where('is_enabled', 1)
                    ->find($id);

        if (! $blog) {
            $blog = new \stdClass();
            $blog->id = $id;
            $blog->title = "Dummy Blog Title {$id}";
            $blog->slug = "dummy-blog-{$id}";
            $blog->feature_image_url = "https://picsum.photos/seed/blog{$id}/1600/900";
            $blog->meta_description = 'This is a dummy meta description for testing the blog show page.';
            $blog->content = '<h2>Introduction</h2><p>This is dummy content for testing the blog show page. It includes various HTML elements to verify the styling.</p><h2>Key Points</h2><ul><li>First important point about the topic</li><li>Second important point with <strong>emphasis</strong></li><li>Third point with a <a href="#">sample link</a></li></ul><blockquote>This is a blockquote used for highlighting important quotes or testimonials within the article.</blockquote><p>Here is a paragraph with <em>italic text</em>, <strong>bold text</strong>, and <code>inline code</code> for testing purposes.</p><h2>Conclusion</h2><p>This concludes the dummy blog content. The layout and typography should look consistent and professional.</p>';
            $blog->createdBy = new \stdClass();
            $blog->createdBy->user_full_name = 'John Doe';
            $blog->created_at = \Carbon\Carbon::now()->subDays($id);
        }

        $suggestedBlogs = CmsPage::where('type', 'blog')
                    ->where('is_enabled', 1)
                    ->where('id', '!=', $blog->id)
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();

        if ($suggestedBlogs->isEmpty()) {
            $dummy = [];
            for ($i = 1; $i <= 3; $i++) {
                $s = new \stdClass();
                $s->id = 100 + $i;
                $s->title = "Suggested Blog {$i}";
                $s->slug = "suggested-blog-{$i}";
                $s->feature_image_url = "https://picsum.photos/seed/suggested{$i}/800/600";
                $s->created_at = \Carbon\Carbon::now()->subDays($i * 2);
                $dummy[] = $s;
            }
            $suggestedBlogs = collect($dummy);
        }

        return view('cms::frontend.blogs.show')
            ->with(compact('blog', 'suggestedBlogs'));
    }

    public function privacyPolicy()
    {
        return view('cms::frontend.privacy-policy.index');
    }

    public function termsAndConditions()
    {
        return view('cms::frontend.terms-and-conditions.index');
    }

    public function faq()
    {
        $faqs = CmsSiteDetail::getValue('faqs');

        return view('cms::frontend.faq.index')
            ->with(compact('faqs'));
    }

    public function contactUs(Request $request)
    {
        $page = $this->cmsUtil->getPageByLayout('contact');

        return view('cms::frontend.pages.contact_us')
            ->with(compact('page'));
    }

    public function postContactForm(Request $request)
    {
        //check if app is in demo & disable action
        $notAllowedInDemo = $this->cmsUtil->notAllowedInDemo();
        if (! empty($notAllowedInDemo)) {
            return $notAllowedInDemo;
        }

        if ($request->ajax()) {
            try {
                $lead_details = $request->only(['name', 'mobile', 'email', 'message']);

                $recipient = CmsSiteDetail::getValue('notifiable_email');

                if (! empty($recipient) && ! empty($lead_details['message'])) {
                    Notification::route('mail', $recipient)
                        ->notify(new NewLeadGeneratedNotification($lead_details));
                }

                $output = [
                    'success' => true,
                    'msg' => __('cms::lang.we_will_contact_soon'),
                ];
            } catch (Exception $e) {
                \Log::emergency('File:'.$e->getFile().'Line:'.$e->getLine().'Message:'.$e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong'),
                ];
            }

            return $output;
        }
    }
}
