<!-- Mars Station Global Pre-loader -->
<div id="mars_station_preloader" class="mars-preloader-wrapper">
    <div class="mars-preloader-container">
        <!-- Mars Planet Background -->
        <div class="mars-planet"></div>

        <!-- Rocket Animation -->
        <div class="rocket-container">
            <div class="rocket">
                <div class="rocket-top">🚀</div>
                <div class="rocket-body"></div>
                <div class="rocket-flame"></div>
            </div>
            <div class="stars">
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
            </div>
        </div>

        <!-- Loading Text -->
        <div class="loading-text">
            <h3>Mars Station</h3>
            <p class="loading-dots">
                <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span>
            </p>
        </div>
    </div>
</div>

<style>
/* Mars Preloader Styles */
.mars-preloader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    overflow: hidden;
}

.mars-preloader-container {
    position: relative;
    width: 300px;
    height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

/* Mars Planet */
.mars-planet {
    position: absolute;
    top: 20px;
    width: 120px;
    height: 120px;
    background: radial-gradient(circle at 30% 30%, #f4a460, #d2691e, #8b4513);
    border-radius: 50%;
    box-shadow: 0 0 40px rgba(244, 164, 96, 0.3), inset -10px -10px 20px rgba(0, 0, 0, 0.5);
    animation: mars-rotate 20s linear infinite;
}

.mars-planet::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at 20% 50%, transparent 20%, rgba(0, 0, 0, 0.1) 100%);
    border-radius: 50%;
}

@keyframes mars-rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Rocket Animation */
.rocket-container {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 40px 0;
}

.rocket {
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 60px;
    height: 100px;
    animation: rocket-launch 3s ease-in-out infinite;
}

.rocket-top {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    font-size: 50px;
    width: 100%;
    text-align: center;
    animation: rocket-spin 2s linear infinite;
}

.rocket-body {
    position: absolute;
    top: 35px;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 50px;
    background: linear-gradient(90deg, #ff6b6b 0%, #ff5252 50%, #ee5a6f 100%);
    border-radius: 5px 5px 0 0;
    box-shadow: inset -2px 0 5px rgba(0, 0, 0, 0.3);
}

.rocket-body::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 20px;
    width: 15px;
    height: 15px;
    background: #4ecdc4;
    border-radius: 50%;
    box-shadow: 30px 0 0 0 #4ecdc4;
}

.rocket-flame {
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-top: 25px solid #ffd93d;
    filter: drop-shadow(0 0 5px #ff6b6b) drop-shadow(0 0 10px #ffa500);
    animation: flame-flicker 0.2s infinite;
}

.rocket-flame::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: -8px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 15px solid #ff6b6b;
    filter: drop-shadow(0 0 3px #ff6b6b);
}

@keyframes rocket-launch {
    0% {
        bottom: 0;
        opacity: 1;
    }
    70% {
        bottom: 180px;
        opacity: 1;
    }
    100% {
        bottom: 200px;
        opacity: 0;
    }
}

@keyframes rocket-spin {
    0%, 100% { transform: translateX(-50%) rotateZ(0deg); }
    50% { transform: translateX(-50%) rotateZ(5deg); }
}

@keyframes flame-flicker {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.6; }
}

/* Stars */
.stars {
    position: absolute;
    width: 100%;
    height: 100%;
}

.star {
    position: absolute;
    width: 3px;
    height: 3px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
    animation: twinkle 1.5s ease-in-out infinite;
}

.star:nth-child(1) {
    top: 20px;
    left: 30px;
    animation-delay: 0s;
}

.star:nth-child(2) {
    top: 40px;
    right: 40px;
    animation-delay: 0.3s;
}

.star:nth-child(3) {
    top: 80px;
    left: 20px;
    animation-delay: 0.6s;
}

.star:nth-child(4) {
    top: 100px;
    right: 50px;
    animation-delay: 0.9s;
}

.star:nth-child(5) {
    bottom: 20px;
    left: 50%;
    animation-delay: 1.2s;
}

@keyframes twinkle {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 1; }
}

/* Loading Text */
.loading-text {
    text-align: center;
    color: white;
    margin-top: 40px;
}

.loading-text h3 {
    font-size: 28px;
    font-weight: bold;
    margin: 0 0 10px 0;
    background: linear-gradient(90deg, #ffd93d, #ff6b6b, #4ecdc4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: glow-text 2s ease-in-out infinite;
}

.loading-dots {
    font-size: 16px;
    letter-spacing: 3px;
    margin: 0;
}

.loading-dots span {
    display: inline-block;
    animation: bounce-letter 1.4s ease-in-out infinite;
    color: #4ecdc4;
}

.loading-dots span:nth-child(1) { animation-delay: 0s; }
.loading-dots span:nth-child(2) { animation-delay: 0.1s; }
.loading-dots span:nth-child(3) { animation-delay: 0.2s; }
.loading-dots span:nth-child(4) { animation-delay: 0.3s; }
.loading-dots span:nth-child(5) { animation-delay: 0.4s; }
.loading-dots span:nth-child(6) { animation-delay: 0.5s; }
.loading-dots span:nth-child(7) { animation-delay: 0.6s; }

@keyframes bounce-letter {
    0%, 100% {
        transform: translateY(0);
        color: #4ecdc4;
    }
    50% {
        transform: translateY(-10px);
        color: #ffd93d;
    }
}

@keyframes glow-text {
    0%, 100% { text-shadow: 0 0 10px rgba(255, 217, 61, 0.3); }
    50% { text-shadow: 0 0 20px rgba(255, 107, 107, 0.6), 0 0 30px rgba(78, 205, 196, 0.4); }
}

/* Responsive */
@media (max-width: 768px) {
    .mars-preloader-container {
        width: 250px;
        height: 350px;
    }

    .mars-planet {
        width: 80px;
        height: 80px;
    }

    .loading-text h3 {
        font-size: 22px;
    }
}
</style>
