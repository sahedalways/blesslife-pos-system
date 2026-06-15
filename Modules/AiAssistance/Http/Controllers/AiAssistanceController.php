<?php

namespace Modules\AiAssistance\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Utils\ModuleUtil;
use App\Utils\Util;
use Modules\AiAssistance\Entities\AiAssistanceHistory;
use OpenAI\Laravel\Facades\OpenAI;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Business;
use App\BusinessLocation;
use App\Contact;
use App\CustomerGroup;
use App\Product;
use App\TaxRate;
use App\Utils\ProductUtil;
use App\Utils\TransactionUtil;
use App\Variation;
use Carbon\Carbon;

class AiAssistanceController extends Controller
{
    public $tools = [];

    protected $moduleUtil;
    protected $productUtil;
    protected $transactionUtil;
    protected $util;

    public function __construct(ModuleUtil $moduleUtil, ProductUtil $productUtil, TransactionUtil $transactionUtil, Util $util)
    {
        $this->moduleUtil = $moduleUtil;
        $this->productUtil = $productUtil;
        $this->transactionUtil = $transactionUtil;
        $this->util = $util;

        $this->tools = [

            'brandproduct-descriptions' => [
                'name' => 'brandproduct-descriptions',
                'label' => __('aiassistance::lang.brandproduct'),
                'icon' => 'fas fa-tags',
                'description' => __('aiassistance::lang.brandproduct_descriptions'),
                'prompt' => 'As a copywriter, craft a product description for details mentioned. keep it informative, engaging, and persuasive, while also reflecting the brands values and tone of voice. Brand/Product Name: {name} \n Description: {description}',
                'max_token' => 1000,
                'example' => __('aiassistance::lang.brandproduct_example'),
            ],

            'product_review' => [
                'name' => 'product_review',
                'label' => __('aiassistance::lang.product_review'),
                'icon' => 'fas fa-star',
                'description' => __('aiassistance::lang.product_review_desc'),
                'prompt' => 'write a review for {name} by sharing your experience with the product. In your review, please provide some details about the product, such as its purpose, functionality, and design. Include features you liked about the product, such as its ease of use, durability, or any unique capabilities it offers. Your review should help others make an informed decision about whether or not to purchase the product. Description: {description} \n Features liked: {features_liked}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.product_review_example'),
            ],

            'review_response' => [
                'name' => 'review_response',
                'label' => __('aiassistance::lang.review_response'),
                'icon' => 'fas fa-reply',
                'description' => __('aiassistance::lang.review_response_desc'),
                'prompt' => 'write a respond to customer review with professional and positive comments. Do not include personal opinions, but rather focus on the product features and benefits. Avoid writing negative or critical comments. Your replies should be concise and to the point. Customer Review: {customer_review}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.review_response_example'),
            ],

            'social_post' => [
                'name' => 'social_post',
                'label' => __('aiassistance::lang.social_post'),
                'icon' => 'fas fa-share',
                'description' => __('aiassistance::lang.social_post_desc'),
                'prompt' => 'write a social media post on the topic, make it engaging and informative, include relevant hashtags, include line breaks & format it in a way easy to read. Topic: {description}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.social_post_example'),
            ],

            'google-ads' => [
                'name' => 'google-ads',
                'label' => __('aiassistance::lang.google_ads'),
                'icon' => 'fab fa-google',
                'description' => __('aiassistance::lang.google_ads_desc'),
                'prompt' => 'write a google ads for the product using the relevant details provided. Start with short and catchy headlines that would grab the attention of potential customers and entice them to click. Brand/Product Name: {name} \n Description: {description}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.google_ads_example'),
            ],

            'fb-ads' => [
                'name' => 'fb-ads',
                'label' => __('aiassistance::lang.fb_ads'),
                'icon' => 'fab fa-facebook',
                'description' => __('aiassistance::lang.fb_ads_desc'),
                'prompt' => 'write a facebook ads for the product using the relevant details provided. Start with short and catchy headlines that would grab the attention of potential customers and entice them to click. Brand/Product Name: {name} \n Description: {description}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.fb_ads_example'),
            ],

            'email' => [
                'name' => 'email',
                'label' => __('aiassistance::lang.email'),
                'icon' => 'fas fa-envelope',
                'description' => __('aiassistance::lang.email_desc'),
                'prompt' => 'write an email that impresses & get replies based on the provided details using {tone} tone. Sender: {sender} \n Recipient: {recipient} \n Email About: {email_about}' ,
                'max_token' => 512,
                'example' => __('aiassistance::lang.email_example'),
            ],

            //https://venngage.com/blog/business-proposal/#3
            'proposal' => [
                'name' => 'proposal',
                'label' => __('aiassistance::lang.proposal'),
                'icon' => 'fas fa-file-alt',
                'description' => __('aiassistance::lang.proposal_desc'),
                'prompt' => 'write an business proposal having applicable sections from executive summary, statement of problem, approach & metholodogy, qualification, schedule & Benchnmark, cost/payment/legal and Benefits. Sender business details: {what_biz_does} \n What can do for customer: {what_do_for_client}'  ,
                'max_token' => 512,
                'example' => __('aiassistance::lang.proposal_example'),
            ],

            'kb' => [
                'name' => 'kb',
                'label' => __('aiassistance::lang.kb'),
                'icon' => 'fas fa-book',
                'description' => __('aiassistance::lang.kb_desc'),
                'prompt' => 'write a step-by-step guide on the provided details. Knowledge base topic/details: {kb_details}' ,
                'max_token' => 512,
                'example' => __('aiassistance::lang.kb_example'),
            ],

            'customer_support_reply' => [
                'name' => 'customer_support_reply',
                'label' => __('aiassistance::lang.customer_support_reply'),
                'icon' => 'fas fa-headset',
                'description' => __('aiassistance::lang.customer_support_reply_desc'),
                'prompt' => 'Write a helpful and empathetic reply to the following customer message: {customer_message}',
                'max_token' => 512,
                'example' => __('aiassistance::lang.customer_support_reply_example'),
            ],

            
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $business_id = request()->session()->get('user.business_id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        //Display remaining tokens in top.
        $token_remaining_display = false;
        $token_details = $this->_tokenDetails($business_id);
        if ($token_details) {
            $token_remaining_display = $token_details['remaining_tokens'] . '/' . $token_details['max_token'] . ' ' . __('aiassistance::lang.token_remaining');
        }

        $tools = $this->tools;
        return view('aiassistance::index')->with(compact('tools', 'token_remaining_display'));
    }

    protected function _tokenDetails($business_id)
    {
        if ($this->moduleUtil->isSuperadminInstalled()) {
            $package = \Modules\Superadmin\Entities\Subscription::active_subscription($business_id);

            if (!empty($package)) {
                $max_token = isset($package->package_details['aiassistance_max_token']) ? $package->package_details['aiassistance_max_token'] : 0;

                $used_tokens = AiAssistanceHistory::whereBetween('created_at', [$package->start_date, $package->end_date])
                    ->where('business_id', $business_id)
                    ->sum('tokens_used');

                $remaining_tokens = $max_token - $used_tokens;

                return ['max_token' => $max_token, 'used_tokens' => $used_tokens, 'remaining_tokens' => $remaining_tokens];
            } else {
                return ['max_token' => 0, 'used_tokens' => 0, 'remaining_tokens' => 0];
            }
        } else {
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($tool)
    {
        $tools = $this->tools;

        abort_if(!isset($tools[$tool]), 404);

        $tool_details = $tools[$tool];
        $tones = [
            'polite' => __('aiassistance::lang.polite'),
            'persuasive' => __('aiassistance::lang.persuasive'),
            'professional' => __('aiassistance::lang.professional'),
            'casual' => __('aiassistance::lang.casual'),
            'witty' => __('aiassistance::lang.witty')
        ];

        $config_languages = config('constants.langs');
        $languages = [];
        foreach ($config_languages as $key => $value) {
            $languages[] = $value['short_name'];
        }
        $default_lang = request()->session()->get('user.language');
        $default_lang = config('constants.langs')[$default_lang]['short_name'];

        return view('aiassistance::create')->with(compact('tool_details', 'tones', 'languages', 'default_lang'));
    }

    /**
     * Store a newly created resource in storage.
     * @param String $tool
     * @param Request $request
     * @return Renderable
     */
    public function generate($tool, Request $request, $from = null)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $tools = $this->tools;
            abort_if(!isset($tools[$tool]), 404);

            //Check for token
            $token_details = $this->_tokenDetails($business_id);
            if ($token_details) {
                if ($token_details['remaining_tokens'] <= 0) {
                    return ['success' => false, 'msg' => __('aiassistance::lang.no_token')];
                }
            }

            $input = $request->except('_token');
            $prompt = $tools[$tool]['prompt'];

            $language = $input['language'] ?? config('constants.langs')[request()->session()->get('user.language')]['full_name'];
            $input['language'] = $language;
            
            $prompt .= '\n Add HTML line breaks & formatting to make it easy to read';
            $prompt .= '\n Write in ' . $language . ' language';

            foreach ($input as $k => $v) {
                $prompt = str_replace('{' . $k . '}', $v, $prompt);
            }
            $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $tools[$tool]['max_token'])) : $tools[$tool]['max_token'];

            //make openai request
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                
                'max_tokens' => $max_token,
                'temperature' => 0
            ]);
            
            $text = $result->choices[0]->message->content;

            //save response in database
            $this->saveHistory([
                'tool_type' => $tools[$tool]['name'],
                'input_data' => $input,
                'output_data' => $text,
                'tokens_used' => $result->usage->totalTokens
            ]);

            //return text if from pos
            if ($from == 'from_pos') {
                return $text;
            }

            $html = view('aiassistance::generate', compact('text'))->render();
            return ['success' => true, 'html' => $html];
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __('messages.something_went_wrong'),
            ];
        }

        //send response
    }

    /**
     * Show the entire history of previous generation
     * @return Renderable
     */
    public function history()
    {

        $business_id = request()->session()->get('user.business_id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {
            $query = AiAssistanceHistory::where('aiassistance_history.business_id', $business_id)
                ->leftJoin('users as u', 'aiassistance_history.user_id', '=', 'u.id')
                ->select(['aiassistance_history.*', DB::raw("CONCAT(COALESCE(u.surname, ''),' ',COALESCE(u.first_name, ''),' ',COALESCE(u.last_name,'')) as added_by")]);
            
            if (request()->input('tool_type') != '') {
                $query->where('tool_type', request()->input('tool_type'));
            }
            if (request()->filled('start_date') && request()->filled('end_date')) {
                $start = request()->input('start_date') . ' 00:00:00';
                $end = request()->input('end_date') . ' 23:59:59';
                $query->whereBetween('aiassistance_history.created_at', [$start, $end]);
            }
            if (request()->input('keyword') != '') {
                $keyword = request()->input('keyword');
                $query->where(function($q) use ($keyword) {
                    $q->where('aiassistance_history.input_data', 'like', "%$keyword%")
                      ->orWhere('aiassistance_history.output_data', 'like', "%$keyword%")
                      ->orWhere('aiassistance_history.tool_type', 'like', "%$keyword%")
                      ->orWhere('u.first_name', 'like', "%$keyword%")
                      ->orWhere('u.last_name', 'like', "%$keyword%")
                      ->orWhere('u.surname', 'like', "%$keyword%")
                    ;
                });
            }

            return Datatables::of($query)
                ->editColumn('input_data', function ($row) {

                    $output = '';
                    foreach ($row->input_data as $k => $v) {
                        if (!empty($output)) {
                            $output .= '<br/>';
                        }
                        $output .= ucfirst($k) . ': ' . $v;
                    }
                    return $output;
                })

                ->editColumn('output_data', function ($row) {
                    $outputData = $row->output_data;
                
                    // Attempt to decode JSON
                    $decoded = json_decode($outputData, true);
                
                    if (is_array($decoded)) {
                        // If it's valid JSON, format it nicely
                        return '<pre>' . htmlspecialchars(json_encode($decoded, JSON_PRETTY_PRINT), ENT_QUOTES, 'UTF-8') . '</pre>';
                    } elseif (is_string($outputData) && preg_match('/^https?:\/\/.+\.(jpg|jpeg|png|gif|webp)(\?.*)?$/i', $outputData)) {
                        // If it's a string and matches an image URL, show the image
                        return '<img src="' . htmlspecialchars($outputData, ENT_QUOTES, 'UTF-8') . '" alt="Output Data Image" style="height: 100px; width: 100px; margin: auto;">';
                    } elseif (is_string($outputData) && preg_match('/^https?:\/\//', $outputData)) {
                        // It's a URL but not an image — show as clickable link
                        return '<a href="' . htmlspecialchars($outputData, ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($outputData, ENT_QUOTES, 'UTF-8') . '</a>';
                    } else {
                        // Fallback: output as plain text
                        return htmlspecialchars($outputData, ENT_QUOTES, 'UTF-8');
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return $this->moduleUtil->format_date($row->created_at, true);
                })
                ->rawColumns(['input_data', 'output_data'])
                ->make(true);
        }

        $tools = $this->tools;
        $tools = collect($tools)->pluck('label', 'name');
        
        return view('aiassistance::history')->with(compact('tools'));
    }

       /**
     * Generate product description using AI
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateProductDescription(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {

            $token_details = $this->_tokenDetails($business_id);
            if ($token_details) {
                if ($token_details['remaining_tokens'] <= 0) {
                    return ['success' => false, 'msg' => __('aiassistance::lang.no_token')];
                }
            }
            // Call the generate function with brandproduct-descriptions tool
            $text = $this->generate('brandproduct-descriptions', $request, 'from_pos');

            $html = view('aiassistance::generate_product_description_modal', compact('text'))->render();

                return response()->json([
                'success' => true,
                'html' => $html,
                'msg' => __('lang_v1.success')
            ]);
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ]);
        }
    }

    /**
     * Generate product image using AI
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateProductImage(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        $token_details = $this->_tokenDetails($business_id);

        if ($token_details) {
            if ($token_details['remaining_tokens'] <= 0) {
                return ['success' => false, 'msg' => __('aiassistance::lang.no_token')];
            }
        }

        $prompt = $request->input('prompt');

        $response = OpenAI::images()->create([
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        $imageUrl = $response->data[0]->url;

        // Save history
        $this->saveHistory([
            'tool_type' => 'product-image-generation',
            'input_data' => ['prompt' => $prompt],
            'output_data' => $imageUrl,
            'tokens_used' => 0 // Image generation doesn't use tokens
        ]);

        $html = view('aiassistance::generate_image', compact('imageUrl'))->render();

        return ['success' => true, 'html' => $html];
    }

  
    /**
     * Download generated product image
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function downloadProductImage(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        $imageUrl = $request->input('url');

        // Get the image content
        $imageContent = file_get_contents($imageUrl);

        // Generate a unique filename
        $filename = 'product_image_' . time() . '.png';

        // Return the image as a download
        return response($imageContent)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    /**
     * Fetch generated product image
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function fetchProductImage(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        $imageUrl = $request->input('url');

        // Get the image content
        $imageContent = file_get_contents($imageUrl);

        // Return the image with proper headers
        return response($imageContent)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'inline');
    }

    public function getPurchaseModal()
    {
        $business_id = request()->session()->get('user.business_id');
        
        $business_locations = BusinessLocation::forDropdown($business_id);
        return view('aiassistance::purchase_modal', compact('business_locations'));
    }
    /**
     * Process the uploaded purchase file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function processPurchaseFile(Request $request)
    {
        try {
            $request->validate([
                'purchase_file' => 'required|image|mimes:jpg,jpeg,png|max:5120',
                'location_id' => 'required|exists:business_locations,id',
            ]);

            $location_id = $request->input('location_id');
            $business_id = request()->session()->get('user.business_id');

            $token_limit = 1000;

             // Check for token
             $token_details = $this->_tokenDetails($business_id);
             if ($token_details) {
                 if ($token_details['remaining_tokens'] <= 0) {
                     return ['success' => false, 'msg' => __('aiassistance::lang.no_token')];
                 }
             }


             $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $token_limit)) : $token_limit;
            

            // Convert image to base64
            $image = base64_encode(file_get_contents($request->file('purchase_file')->getRealPath()));

            // Compose OpenAI Vision prompt
            $payload = [
                'model' => 'gpt-4.1-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'You are an intelligent document parser. From the purchase invoice image, extract all relevant purchase details and return a clean JSON structured response with the following format:

                            {
                            "supplier_name": "", // The name of the supplier or seller
                            "reference_no": "", // Invoice number or reference number
                            "purchase_date": "", // Date of purchase or invoice date
                            "purchase_status": "", // Status like received, pending, etc. (if available)
                            "business_name": "", // Buyer or business name
                            "products": [
                                {
                                    "sku": "", // SKU or product code
                                    "product_name": "", // Product name without any additional information
                                    "purchase_quantity": "", // Quantity purchased
                                    "unit_cost_before_discount": "", // Price before any discount
                                    "discount_percent": "", // Discount percentage (if available)
                                    "product_tax": "", // Tax value or percentage (only tax name, e.g., GST, VAT)
                                    "lot_number": "", // Lot or batch number (if available)
                                    "mfg_date": "", // Manufacturing date (if available)
                                    "exp_date": "" // Expiry date (if available)
                                }
                            ]
                        }

                        Important Notes:
                        - Only extract relevant product and tax information (e.g., names like GST or VAT, not full tax breakdowns unless listed).
                        - The business name and billing address may be the same.
                        - The supplier name is the issuing party (not the buyer).
                        - Normalize values wherever possible (e.g., date formats as YYYY-MM-DD).
                        '
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/jpeg;base64,' . $image,
                                ],
                            ],
                        ],

                    ],
                ],
                'max_tokens' => $max_token,
            ];

            // Send to OpenAI API
            $response = Http::withToken(env('OPENAI_API_KEY'))
                ->post('https://api.openai.com/v1/chat/completions', $payload);

                

            if ($response->failed()) {
                Log::error('OpenAI API Error: ' . $response->body());
                return response()->json([
                    'success' => false,
                    'msg' => __('aiassistance::lang.error_processing_file')
                ]);
            }
            $responseData = $response->json();

            // Check if we have valid response data
            if (!isset($responseData['choices'][0]['message']['content'])) {
                return response()->json([
                    'success' => false,
                    'msg' => __('aiassistance::lang.invalid_response_format')
                ]);
            }

            $content = $responseData['choices'][0]['message']['content'];

          

            // Extract JSON from the response content
            if (preg_match('/```json\n(.*?)\n```/s', $content, $matches)) {
                $content = $matches[1];
            }

            $decodedContent = json_decode($content, true);


            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON Decode Error: ' . json_last_error_msg());
                return response()->json([
                    'success' => false,
                    'msg' => __('aiassistance::lang.invalid_response_format')
                ]);
            }

            $formatted_data = [];
            $missing_skus = [];
            $row_index = 0;
            $error_msg = '';

            // Check supplier
            $supplier = null;
            $formatted_address = '';
            if (!empty($decodedContent['supplier_name'])) {
                $supplier = Contact::where('business_id', $business_id)
                    ->where('type', 'supplier')
                    ->where('name', 'like', '%' . $decodedContent['supplier_name'] . '%')
                    ->first();

                if (!empty($supplier)) {
                    // Format supplier address
                    $supplier_address = [];
                    if ($supplier->supplier_business_name) {
                        $supplier_address[] = $supplier->supplier_business_name;
                    }
                    if ($supplier->name) {
                        $supplier_address[] = $supplier->name;
                    }
                    if ($supplier->address_line_1) {
                        $supplier_address[] = $supplier->address_line_1;
                    }
                    if ($supplier->address_line_2) {
                        $supplier_address[] = $supplier->address_line_2;
                    }
                    if ($supplier->city) {
                        $supplier_address[] = $supplier->city;
                    }
                    if ($supplier->state) {
                        $supplier_address[] = $supplier->state;
                    }
                    if ($supplier->country) {
                        $supplier_address[] = $supplier->country;
                    }
                    if ($supplier->zip_code) {
                        $supplier_address[] = $supplier->zip_code;
                    }
                    $formatted_address = implode(', ', $supplier_address);
                }
            }

            // Map purchase status to correct value
            $purchase_status = '';
            if (!empty($decodedContent['purchase_status'])) {
                $status = strtolower(trim($decodedContent['purchase_status']));
                $valid_statuses = $this->moduleUtil->orderStatuses();

                if (isset($valid_statuses[$status])) {
                    $purchase_status = $status;
                }
            }
            

            // Process each product
            foreach ($decodedContent['products'] as $key => $product) {
                $row_index = $key + 1;
                $temp_array = [];

                if (empty($product['sku'])) {
                    $error_msg = __('aiassistance::lang.product_sku_required', ['row' => $row_index]);
                    break;
                }

                $variation = Variation::where('sub_sku', trim($product['sku']))
                    ->join('products', 'products.id', '=', 'variations.product_id')
                    ->where('products.business_id', $business_id)
                    ->with([
                        'product_variation',
                        'variation_location_details' => function ($q) use ($location_id) {
                            $q->where('location_id', $location_id);
                        },
                    ])
                    ->select('variations.*')
                    ->first();

                if (empty($variation)) {
                    // Store missing SKU and continue processing
                    $missing_skus[] = [
                        'row' => $row_index,
                        'sku' => $product['sku'],
                        'product_name' => $product['product_name'] ?? ''
                    ];
                    continue;
                }

                $product_obj = Product::where('id', $variation->product_id)
                    ->where('business_id', $business_id)
                    ->with(['unit'])
                    ->first();

                if (empty($product_obj)) {
                    $error_msg = __('aiassistance::lang.product_not_found_exception', ['row' => $row_index, 'sku' => $product['sku']]);
                    break;
                }

                $sub_units = $this->productUtil->getSubUnits($business_id, $product_obj->unit->id, false, $product_obj->id);

                $temp_array['variation'] = $variation;
                $temp_array['product'] = $product_obj;
                $temp_array['sub_units'] = $sub_units;

                $temp_array['quantity'] = $product['purchase_quantity'] ?? 1;

                $temp_array['unit_cost_before_discount'] = ! empty($product['unit_cost_before_discount']) ? $product['unit_cost_before_discount'] : $variation->default_purchase_price;

                $temp_array['discount_percent'] = !empty($product['discount_percent']) && is_numeric($product['discount_percent']) ? $product['discount_percent'] : 0;

                $tax_id = null;
                if (!empty($product['product_tax'])) {
                    $tax_name = trim($product['product_tax']);
                    $tax = TaxRate::where('business_id', $business_id)
                        ->where('name', 'like', "%{$tax_name}%")
                        ->first();
                    if (!empty($tax)) {
                        $tax_id = $tax->id;
                    }
                }

                $temp_array['tax_id'] = $tax_id;
                $temp_array['lot_number'] = $product['lot_number'];
                $temp_array['mfg_date'] = $product['mfg_date'];
                $temp_array['exp_date'] = $product['exp_date'];

                $formatted_data[] = $temp_array;
            }

            if (!empty($error_msg)) {
                return response()->json([
                    'success' => false,
                    'msg' => $error_msg
                ]);
            }
            
            $hide_tax = 'hide';
            if ($request->session()->get('business.enable_inline_tax') == 1) {
                $hide_tax = '';
            }

            $taxes = TaxRate::where('business_id', $business_id)
                ->ExcludeForTaxGroup()
                ->get();

            $currency_details = $this->transactionUtil->purchaseCurrencyDetails($business_id);

            $row_count = 0;

            $html = view('purchase.partials.imported_purchase_product_rows')
                ->with(compact('formatted_data', 'taxes', 'currency_details', 'hide_tax', 'row_count'))->render();

            // Save history of the purchase file processing
            $this->saveHistory([
                'tool_type' => 'purchase-invoice-file-processing',
                'input_data' => ['prompt' => 'Purchase Invoice File Processing'],
                'output_data' => json_encode([
                    'supplier_details' => [
                        'supplier_id' => $supplier->id ?? '',
                        'supplier_name' => $supplier->name ?? '',
                        'supplier_address' => $formatted_address ?? ''
                    ],
                    'invoice_details' => [
                        'reference_no' => $decodedContent['reference_no'] ?? '',
                        'purchase_date' => $decodedContent['purchase_date'] ?? '',
                        'purchase_status' => $purchase_status
                    ],
                    'products_count' => count($formatted_data),
                    'missing_skus_count' => count($missing_skus),
                    'missing_skus' => $missing_skus
                ]),
                'tokens_used' => $responseData['usage']['total_tokens'] ?? 0
            ]);

            return response()->json([
                'success' => true,
                'msg' => __('lang_v1.success'),
                'html' => $html,
                'missing_skus' => $missing_skus,
                'invoice_details' => [
                    'supplier_id' =>  $supplier->id ?? '',
                    'supplier_name' => $supplier->name ?? '',
                    'supplier_address' => $formatted_address ?? '',
                    'reference_no' => $decodedContent['reference_no'] ?? '',
                    'purchase_date' => $decodedContent['purchase_date'] ? Carbon::createFromTimestamp(strtotime($decodedContent['purchase_date']))->format('d/m/Y H:i') : '',
                    'purchase_status' => $purchase_status,
                    'location_id' => $location_id ?? '',
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error processing purchase file: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('aiassistance::lang.error_processing_file')
            ]);
        }
    }

     /**
     * Save AI assistance history
     * @param array $data
     * @return void
     */
    private function saveHistory($data)
    {
        $history = new AiAssistanceHistory;
        $history->business_id = request()->session()->get('user.business_id');
        $history->user_id = request()->session()->get('user.id');
        $history->tool_type = $data['tool_type'];
        $history->input_data = $data['input_data'];
        $history->output_data = $data['output_data'];
        $history->tokens_used = $data['tokens_used'] ?? 0;
        $history->save();
    }

    /**
     * Generate AI-powered profit/loss analysis
     * 
     * This method provides intelligent business insights by analyzing
     * profit/loss data using AI. It compares current period performance
     * with previous periods and provides actionable recommendations.
     * 
     * @param Request $request Contains date range and filtering parameters
     * @return \Illuminate\Http\JsonResponse
     */
    public function aiProfitLossAnalysis(Request $request)
    {
        $business_id = $request->session()->get('user.business_id');
        $location_id = $request->input('location_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $user_id = $request->input('user_id');
        $permitted_locations = $request->input('permitted_locations');

        $token_limit = 1000; // Higher limit for complex analysis
        
        // Token availability check
        $token_details = $this->_tokenDetails($business_id);
        if ($token_details) {
            if ($token_details['remaining_tokens'] <= 0) {
                return ['success' => false, 'msg' => __('aiassistance::lang.no_token')];
            }
        }

        $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $token_limit)) : $token_limit;

        // Get the profit/loss report data for current period
        $currentPeriodData = $this->transactionUtil->getProfitLossDetails(
            $business_id,
            $location_id,
            $start_date,
            $end_date,
            $user_id,
            $permitted_locations
        );

        // Calculate previous period dates (same duration as current period)
        try {
            $current_start = \Carbon\Carbon::parse($start_date);
            $current_end = \Carbon\Carbon::parse($end_date);
            $period_duration = $current_start->diffInDays($current_end);
            
            $previous_end = $current_start->copy()->subDay();
            $previous_start = $previous_end->copy()->subDays($period_duration);
        } catch (\Exception $e) {
            // If date parsing fails, use current date minus 30 days as fallback
            $current_start = \Carbon\Carbon::now()->subDays(30);
            $current_end = \Carbon\Carbon::now();
            $period_duration = 30;
            
            $previous_end = $current_start->copy()->subDay();
            $previous_start = $previous_end->copy()->subDays($period_duration);
        }

        // Get previous period data for comparison
        $previousPeriodData = $this->transactionUtil->getProfitLossDetails(
            $business_id,
            $location_id,
            $previous_start->format('Y-m-d'),
            $previous_end->format('Y-m-d'),
            $user_id,
            $permitted_locations
        );

        // Get user's preferred language for AI response
        $language = config('constants.langs')[request()->session()->get('user.language')]['full_name'];

        // Format the data as JSON
        $reportDataJson = json_encode([
            'current_period' => [
                'start_date' => $start_date,
                'end_date' => $end_date,
                'data' => $currentPeriodData
            ],
            'previous_period' => [
                'start_date' => $previous_start->format('Y-m-d'),
                'end_date' => $previous_end->format('Y-m-d'),
                'data' => $previousPeriodData
            ]
        ], JSON_PRETTY_PRINT);

        $currencyCode = request()->session()->get('currency')['code'] ?? 'USD'; // Get from session
        $currencyDetails = request()->session()->get('currency');
        
        // Generate example using num_f() function
        $exampleAmount = 15532.51;
        $formattedExample = $this->util->num_f($exampleAmount, true, null, false);
        
        // Get currency formatting details
        $thousandSeparator = $currencyDetails['thousand_separator'] ?? ',';
        $decimalSeparator = $currencyDetails['decimal_separator'] ?? '.';
        $currencySymbol = $currencyDetails['symbol'] ?? '$';
        
        $prompt = <<<EOT
                    You are a professional business analyst AI.

                    You are given BOTH current period and previous period Profit & Loss report data in JSON format. The currency used in this report is: "{$currencyCode}". 

                    CRITICAL FORMATTING REQUIREMENTS - YOU MUST FOLLOW THESE EXACTLY:
                    - Thousand separator: "{$thousandSeparator}" (use this to separate thousands)
                    - Decimal separator: "{$decimalSeparator}" (use this for decimal places)
                    - Currency symbol: "{$currencySymbol}" (with space before the number)
                    - CORRECT EXAMPLE: {$formattedExample}

                    RULE: Always format numbers using the exact format shown in the example above.
                    Use the specified thousand separator and decimal separator for this currency.

                    Do not display the raw data that was provided in the report as part of your response.

                    Please provide your insights in FOUR structured sections. Use HTML line breaks (&lt;br&gt;) to separate lines for readability. Include formatted currency amounts using EXACTLY the format shown in the example above.

                    Respond in the following language: {$language}.

                    <strong>1. Executive Summary:</strong><br>
                    - Give a concise, high-level summary of the business's financial performance for the current period.<br>
                    - Clearly state whether the business is making a profit or loss, and by how much.<br>
                    - Highlight the most important numbers (e.g., Gross Profit, Net Profit, Total Sales, COGS, Opening & Closing Stock) and explain what they mean for the business.<br>
                    - Point out any unusual patterns, trends, or sudden changes in revenue, expenses, or stock.<br>

                    <strong>2. Period-over-Period Comparison:</strong><br>
                    - Compare the current period performance with the previous period using specific numbers.<br>
                    - Calculate and highlight percentage changes for key metrics (Total Sales, Gross Profit, Net Profit, Total Expenses, etc.).<br>
                    - Identify whether the business is improving or declining and by what magnitude.<br>
                    - Highlight the most significant changes (both positive and negative) between periods.<br>
                    - Discuss changes in stock levels, purchase patterns, and sales trends.<br>

                    <strong>3. Profitability Analysis:</strong><br>
                    - Explain in detail the main reasons for the profit or loss, referencing specific numbers from both periods.<br>
                    - Discuss the impact of purchases, discounts, returns, and shipping/other expenses on profitability.<br>
                    - Analyze cost trends and margin changes between periods.<br>
                    - Identify which cost categories or revenue streams are driving the changes.<br>

                    <strong>4. Actionable Recommendations:</strong><br>
                    - Give specific, practical, and data-driven advice based on the period-over-period trends.<br>
                    - Suggest actions such as reducing unnecessary stock, controlling specific costs, managing returns, improving pricing, or boosting sales of high-margin products.<br>
                    - If you spot any risks or missed opportunities based on the comparison, mention them and suggest how to address them.<br>
                    - Prioritize recommendations based on their potential impact on profitability.<br>
                    - Make your recommendations as clear and actionable as possible, so the business owner knows exactly what to do next.<br>

                    <strong>Report Data:</strong>
                    <pre>
                    $reportDataJson
                    </pre>
                    EOT;

        // Generate AI analysis using OpenAI
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo-1106',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => $max_token,
            'temperature' => 0
        ]);

        $text = $result->choices[0]->message->content;

        // Save analysis to history
        $this->saveHistory([
            'tool_type' => 'profit_loss_analysis',
            'input_data' => ['prompt' => $prompt],
            'output_data' => $text,
            'tokens_used' => $result->usage->totalTokens
        ]);

        // Render the modal view with the analysis text
        $html = view('aiassistance::generate_report_analysis_modal', compact('text'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'msg' => __('lang_v1.success'),
        ]);
    }

     /**
     * Get diet plan modal
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getDietPlanModal()
    {
        return view('aiassistance::diet_plan_modal');
    }


    /**
     * Generate diet plan using AI
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateDietPlan(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {

            $token_limit = 1000;
            $token_details = $this->_tokenDetails($business_id);

            if ($token_details) {
                if ($token_details['remaining_tokens'] <= 0) {
                    return response()->json(['success' => false, 'msg' => __('aiassistance::lang.no_token')]);
                }
            }

            $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $token_limit)) : $token_limit;

            $customer_profile = $request->input('customer_profile');
            
            if (empty($customer_profile)) {
                return response()->json(['success' => false, 'msg' => __('aiassistance::lang.customer_profile_required')]);
            }

            // Create diet plan generation prompt
            $prompt = 'Generate a comprehensive diet plan based on the following customer profile: ' . $customer_profile . '. Create a detailed meal plan with specific food recommendations for each time period. Focus ONLY on food, nutrition, and meal suggestions. Do NOT include any exercise or workout recommendations. Return the response in JSON format with the following structure: {"morning": "", "breakfast": "", "before_lunch": "", "lunch": "", "afternoon": "", "evening": "", "dinner": "", "before_sleep": "", "before_workout": "", "after_workout": "", "remarks": ""}. Each field should contain specific food items, meal suggestions, and nutritional recommendations. For workout-related fields (before_workout, after_workout), suggest appropriate pre/post workout meals and snacks only.';

            // Make OpenAI request directly
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => $max_token,
                'temperature' => 0
            ]);
            
            $text = $result->choices[0]->message->content;

            // Try to parse JSON response
            $diet_plan_data = null;
            try {
                // Clean the response to extract JSON
                $json_match = preg_match('/\{.*\}/s', $text, $matches);
                if ($json_match) {
                    $diet_plan_data = json_decode($matches[0], true);
                }
            } catch (\Exception $e) {
                Log::error('Error parsing diet plan JSON: ' . $e->getMessage());
            }
            // Save diet plan generation to history
            $this->saveHistory([
                'tool_type' => 'diet_plan_generation',
                'input_data' => ['customer_profile' => $customer_profile],
                'output_data' => $text,
                'tokens_used' => $result->usage->totalTokens
            ]);
            
            // Render the modal view with the diet plan data
            $html = view('aiassistance::diet_plan_review_modal', ['dietData' => $diet_plan_data])->render();
            
            return response()->json([
                'success' => true,
                'html' => $html,
                'msg' => __('lang_v1.success'),
            ]);
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ]);
        }
    }

      /**
     * Get workout plan modal
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getWorkoutPlanModal()
    {
        return view('aiassistance::workout_plan_modal');
    }
    
    /**
     * Generate workout plan using AI
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateWorkoutPlan(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        $user_id = request()->session()->get('user.id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $token_limit = 1000;
            $token_details = $this->_tokenDetails($business_id);
            if ($token_details) {
                if ($token_details['remaining_tokens'] <= 0) {
                    return response()->json(['success' => false, 'msg' => __('aiassistance::lang.no_token')]);
                }
            }

            $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $token_limit)) : $token_limit;

            $member_profile = $request->input('member_profile');
            $contact_id = $request->input('contact_id');
            
            if (empty($member_profile)) {
                return response()->json(['success' => false, 'msg' => __('aiassistance::lang.member_profile_required')]);
            }

            // Create workout plan generation prompt
            $prompt = 'Generate a comprehensive workout plan based on the following member profile: ' . $member_profile . '. Create a detailed exercise plan with specific exercises, sets, reps, and rest periods for each day of the week. Focus ONLY on exercises, workout routines, and fitness recommendations. Do NOT include any diet or nutrition recommendations. Return the response in JSON format with the following structure: {"monday": "", "tuesday": "", "wednesday": "", "thursday": "", "friday": "", "saturday": "", "sunday": "", "warm_up": "", "cool_down": "", "rest_day_activities": "", "remarks": ""}. Each day should contain specific exercises with sets, reps, and rest periods. Include proper warm-up and cool-down routines.';

            // Make OpenAI request directly
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => $max_token,
                'temperature' => 0
            ]);
            
            $text = $result->choices[0]->message->content;

            // Try to parse JSON response
            $workout_plan_data = null;
            try {
                // Clean the response to extract JSON
                $json_match = preg_match('/\{.*\}/s', $text, $matches);
                if ($json_match) {
                    $workout_plan_data = json_decode($matches[0], true);
                }
            } catch (\Exception $e) {
                Log::error('Error parsing workout plan JSON: ' . $e->getMessage());
            }
            
            // Save workout plan generation to history
            $this->saveHistory([
                'tool_type' => 'workout_plan_generation',
                'input_data' => ['member_profile' => $member_profile, 'contact_id' => $contact_id],
                'output_data' => $text,
                'tokens_used' => $result->usage->totalTokens
            ]);
            
            // Render the modal view with the workout plan data and contact_id
            $html = view('aiassistance::workout_plan_review_modal', [
                'workoutData' => $workout_plan_data,
                'contact_id' => $contact_id
            ])->render();
            
            return response()->json([
                'success' => true,
                'html' => $html,
                'msg' => __('lang_v1.success'),
            ]);
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ]);
        }
    }

    /**
     * Get message description modal
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessageDescriptionModal(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Render the modal view
            $html = view('aiassistance::message_description_modal')->render();
            
            return response()->json([
                'success' => true,
                'html' => $html,
            ]);
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ]);
        }
    }

    /**
     * Generate AI message for communicator
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateMessage(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');

        if (!(auth()->user()->can('superadmin') || ($this->moduleUtil->hasThePermissionInSubscription($business_id, 'aiassistance_module')))) {
            abort(403, 'Unauthorized action.');
        }

        try {

            $token_limit = 1000;
            $token_details = $this->_tokenDetails($business_id);
            if ($token_details) {
                if ($token_details['remaining_tokens'] <= 0) {
                    return response()->json(['success' => false, 'msg' => __('aiassistance::lang.no_token')]);
                }
            }

            $max_token = ($token_details != false) ? (min($token_details['remaining_tokens'], $token_limit)) : $token_limit;

            $description = $request->input('description');
            
            if (empty($description)) {
                return response()->json([
                    'success' => false,
                    'msg' => __('aiassistance::lang.message_description_required')
                ]);
            }

            // Build the prompt based on the description
            $prompt = "Generate a professional business communication message based on the following description:\n";
            $prompt .= "Message Purpose/Description: " . $description . "\n";
            $prompt .= "Please create a clear, professional, and engaging message that would be appropriate for business communication. Make sure the message is well-structured and addresses the purpose described above.";

            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => $max_token,
                'temperature' => 0.7
            ]);
            
            $message = $result->choices[0]->message->content;

            // Save message generation to history
            $this->saveHistory([
                'tool_type' => 'message_generation',
                'input_data' => [
                    'description' => $description,
                    'prompt' => $prompt
                ],
                'output_data' => $message,
                'tokens_used' => $result->usage->totalTokens
            ]);
            
            // Render the modal view with the generated message
            $html = view('aiassistance::message_review_modal', [
                'message' => $message
            ])->render();
            
            return response()->json([
                'success' => true,
                'html' => $html,
                'message' => $message,
                'msg' => __('aiassistance::lang.message_generated_successfully'),
            ]);
        } catch (\Exception $e) {
            Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            return response()->json([
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ]);
        }
    }


}
