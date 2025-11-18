@extends('layouts.website.master')
@section('content')
<style>
.inner-page-heading {
    padding: 100px 0;
    text-align: center;
}

.inner-page-heading h1 {
    font-size: 3.8rem;
    font-weight: 700;
    color: #fff;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    letter-spacing: 2px;
}

.terms-section {
    margin-bottom: 0 !important;
    padding: 80px 0;
    /* background: var(--section-bg); */
    min-height: 100vh;
}

.terms-container {
    /* max-width: 900px; */
    margin: 0 auto;
    padding: 0 20px;
}

.terms-content {
    background: var(--default-color);
    border-radius: 10px;
    padding: 60px;
    box-shadow: 0 10px 30px rgba(8, 30, 55, 0.1);
    border: 1px solid rgba(207, 164, 12, 0.2);
}

.terms-header {
    text-align: center;
    margin-bottom: 50px;
    padding-bottom: 30px;
    border-bottom: 2px solid var(--secondry-theme);
}

.terms-title {
    font-size: var(--text-30);
    font-weight: 700;
    color: var(--primary-theme);
    margin-bottom: 15px;
    font-family: var(--primary-font);
}

.terms-subtitle {
    font-size: var(--text-16);
    color: var(--light-black);
    font-weight: 500;
    font-style: italic;
}

.terms-text {
    margin-bottom: 25px;
    font-size: var(--text-15);
    line-height: 1.8;
    color: var(--light-black);
    font-family: var(--secondry-font);
}

.terms-section-title {
    font-size: var(--text-20);
    font-weight: 600;
    color: var(--primary-theme);
    margin: 40px 0 20px 0;
    padding: 15px 0;
    border-bottom: 2px solid var(--light-theme);
    font-family: var(--primary-font);
}

.terms-section-title:first-child {
    margin-top: 0;
}

.terms-list {
    margin: 20px 0;
    padding-left: 20px;
}

.terms-list li {
    margin-bottom: 15px;
    font-size: var(--text-15);
    line-height: 1.7;
    color: var(--light-black);
}

.terms-sub-list {
    margin: 15px 0;
    padding-left: 20px;
}

.terms-sub-list li {
    margin-bottom: 10px;
    font-size: var(--text-15);
    line-height: 1.6;
    color: var(--light-black);
}

.contact-info {
    background: var(--primary-theme);
    color: var(--default-color);
    padding: 40px;
    border-radius: 10px;
    margin-top: 50px;
    text-align: center;
}

.contact-info h3 {
    font-size: var(--text-22);
    margin-bottom: 30px;
    font-weight: 600;
    color: var(--default-color);
    font-family: var(--primary-font);
}

.contact-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.contact-item {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 8px;
    border: 1px solid rgba(207, 164, 12, 0.3);
    word-wrap: break-word;
    overflow-wrap: break-word;
    hyphens: auto;
}

.contact-item strong {
    display: block;
    margin-bottom: 8px;
    font-size: var(--text-15);
    color: var(--secondry-theme);
    font-weight: 600;
}

.contact-item a {
    color: var(--default-color);
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.contact-item a:hover {
    color: var(--secondry-theme);
    transform: translateY(-2px);
}

.legal-notice {
    background: var(--section-bg);
    border: 2px solid var(--light-theme);
    border-radius: 10px;
    padding: 30px;
    margin-top: 40px;
}

.legal-notice h3 {
    color: var(--primary-theme);
    font-size: var(--text-20);
    margin-bottom: 20px;
    font-weight: 600;
    font-family: var(--primary-font);
}

.highlight-box {
    background: rgba(207, 164, 12, 0.1);
    border: 1px solid var(--secondry-theme);
    border-radius: 8px;
    padding: 20px;
    margin: 20px 0;
    border-left: 4px solid var(--secondry-theme);
}

.highlight-box p {
    margin: 0;
    font-weight: 500;
    color: var(--primary-theme);
    font-size: var(--text-15);
}

@media (max-width: 768px) {
    .terms-content {
        padding: 40px 30px;
    }
    
    .terms-title {
        font-size: var(--text-24);
    }
    
    .terms-section-title {
        font-size: var(--text-18);
    }
    
    .contact-details {
        grid-template-columns: 1fr;
    }
}
</style>
@section('title', $page_title)
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Cookie Policy
            </h1>
        </div>
    </section>
</main>

<section class="terms-section" data-aos="fade-up">
    <div class="terms-container">
        <div class="terms-content">
            <div class="terms-header">
                <h1 class="terms-title">Cookie Policy</h1> 
            </div>
            
            <div class="terms-text">
                We use cookies and similar technologies to make this website work properly, improve your browsing experience, and help us understand how the site is used.
            </div>

            <h2 class="terms-section-title">Types of cookies we use:</h2>
            <ul class="terms-list">
                <li><strong>Necessary cookies:</strong> Required for the basic operation of the site.</li>
                <li><strong>Preferences:</strong> Remember your settings, like language or display choices.</li>
                <li><strong>Analytics:</strong> Help us measure site performance and improve our services.</li>
                <li><strong>Marketing:</strong> Allow us and our partners to deliver relevant advertising and content.</li>
            </ul>

            <h2 class="terms-section-title">Managing Your Cookie Preferences</h2>
            <p class="terms-text">
                You can manage or change your cookie preferences at any time through your browser settings or by using the cookie consent options provided on our site. Please note that disabling certain cookies may affect how the site functions.
            </p>

            <h2 class="terms-section-title">More Information</h2>
            <p class="terms-text">
                For more details about how we handle your information, please see our&nbsp; [<a href="{{ route('privacy-policy') }}"> Privacy Policy </a>].
            </p>

            
        </div>
    </div>
</section> 
 
@endsection
