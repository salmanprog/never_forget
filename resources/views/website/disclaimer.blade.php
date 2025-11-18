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
                Disclaimer
            </h1>
        </div>
    </section>
</main>

<section class="terms-section" data-aos="fade-up">
    <div class="terms-container">
        <div class="terms-content">
            <div class="terms-header">
                <h1 class="terms-title">Terms of Use</h1>
                {{-- <p class="terms-subtitle">Effective Date: [Insert Date]</p> --}}
            </div>
            
            <div class="terms-text">
                Welcome to NeverForgetAppreciation.com ("Company," "we," "our," or "us"). By accessing or using our website, services, or content (collectively, the "Services"), you agree to these Terms of Use ("Terms"). Please read them carefully before using our Services.
            </div>

            <h2 class="terms-section-title">1. Acceptance of Terms</h2>
            <p class="terms-text">
                By using our Services, you confirm that you are at least 18 years old or the age of majority in your jurisdiction. If you do not agree to these Terms, you may not access or use our Services.
            </p>

            <h2 class="terms-section-title">2. Use of Services</h2>
            <ul class="terms-list">
                <li>You may use our Services only for lawful purposes.</li>
                <li>You agree not to:
                    <ul class="terms-sub-list">
                        <li>Copy, reproduce, distribute, or exploit any part of our Services without prior written permission.</li>
                        <li>Attempt to interfere with the proper functioning of our Services, including introducing malware or unauthorized access.</li>
                        <li>Use our Services to send spam, harass, or otherwise cause harm.</li>
                    </ul>
                </li>
            </ul>

            <h2 class="terms-section-title">3. Intellectual Property</h2>
            <p class="terms-text">
                All content, logos, graphics, text, designs, and other materials provided on this website are owned by NEVER FORGET LLC or our partners, unless otherwise noted. You may not use, copy, or distribute our intellectual property without express written permission.
            </p>

            <h2 class="terms-section-title">4. Accounts and Information</h2>
            <p class="terms-text">If you create an account with us:</p>
            <ul class="terms-list">
                <li>You agree to provide accurate and current information.</li>
                <li>You are responsible for maintaining the confidentiality of your login credentials.</li>
                <li>You are responsible for all activities that occur under your account.</li>
            </ul>

            <h2 class="terms-section-title">5. Third-Party Services</h2>
            <p class="terms-text">
                Our Services may include links or references to third-party websites, products, or services. We do not control and are not responsible for the content, policies, or practices of these third parties. Your dealings with them are solely between you and the third party.
            </p>

            <h2 class="terms-section-title">6. Disclaimer of Warranties</h2>
             
            <p class="terms-text">Our Services, including all products offered, are provided "as is" and "as available" without warranties of any kind, express or implied.</p>
             
            <p class="terms-text">
                NEVER FORGET LLC does not manufacture the products offered and makes no representations or warranties regarding their quality, safety, or fitness for a particular purpose.
            </p>
            <p class="terms-text">
                Any warranties that may apply to products are solely those provided by the manufacturer or product provider, if applicable.
            </p>

            <h2 class="terms-section-title">7. Allergy Disclaimer</h2>
             
            <p class="terms-text">NEVER FORGET LLC provides appreciation services in collaboration with third-party providers and trusted collaborators. Some products we deliver — including food, flowers, and gifts — may contain or come into contact with common allergens such as nuts, dairy, soy, wheat, gluten, or other ingredients that could cause allergic reactions.</p>
             
            <p class="terms-text">
                NEVER FORGET LLC does not manufacture these products and cannot guarantee that any item is free from allergens. Customers are responsible for knowing and managing their own allergies. We strongly recommend reviewing all product details and labels provided by the supplier before use or consumption.
            </p>
            <p class="terms-text">
                By purchasing through NEVER FORGET LLC, you acknowledge and accept this responsibility.
            </p>

            <h2 class="terms-section-title">8. Limitation of Liability</h2>
            <p class="terms-text">
                To the fullest extent permitted by law, NEVER FORGET LLC shall not be liable for any damages, claims, or losses arising out of or related to the use of products or services purchased through our website, except as required by law.
            </p>
            <p class="terms-text">
                Responsibility for defects, damages, or failures lies exclusively with the manufacturer or provider of the product, in accordance with any warranty they may provide.
            </p>

            <h2 class="terms-section-title">9. Indemnification</h2>
            <p class="terms-text">
                You agree to indemnify and hold harmless NEVER FORGET LLC, its officers, employees, and partners from any claims, liabilities, damages, or expenses (including legal fees) arising from your use of our Services or violation of these Terms.
            </p>

            <h2 class="terms-section-title">10. Changes to These Terms</h2>
            <p class="terms-text">
                We may update these Terms from time to time. The updated version will be posted on this page with the new effective date. Continued use of our Services after changes means you accept the revised Terms.
            </p>

            <h2 class="terms-section-title">11. Governing Law</h2>
            <p class="terms-text">
                These Terms are governed by the laws of the State of South Carolina, without regard to conflict of law principles.
            </p>

            <h2 class="terms-section-title">12. Contact Us</h2>
            <p class="terms-text">If you have questions about these Terms, please contact us at:</p>

            <div class="contact-info">
                <h3>NEVER FORGET LLC</h3>
                <div class="contact-details">
                    {{-- <div class="contact-item">
                        <strong>Address:</strong>
                        259 Sweet Cherry Ln<br>
                        Summerville, SC 29486
                    </div>
                    <div class="contact-item">
                        <strong>Phone:</strong>
                        <a href="tel:+18439989900">(843) 998-9900</a>
                    </div> --}}
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <a href="mailto:disclaimer@neverforgetappreciation.com">disclaimer@neverforgetappreciation.com</a>
                    </div>
                    {{-- <div class="contact-item">
                        <strong>Website:</strong>
                        <a href="https://neverforgetappreciation.com" target="_blank">https://neverforgetappreciation.com</a>
                    </div> --}}
                </div>
            </div>
             
            <div class="legal-notice">
                <h3>Legal Notice</h3>
                <p class="terms-text">
                    This website, NeverForgetAppreciation.com, is owned and operated by NEVER FORGET LLC.
                </p>
                <p class="terms-text">
                    All content, including text, graphics, logos, images, and design elements, are the property of NEVER FORGET LLC or its licensors unless otherwise stated. Unauthorized use, reproduction, or distribution of this content is strictly prohibited.
                </p>
                <div class="highlight-box">
                    <p>
                        <strong>Disclaimer:</strong> All products and services provided through this website are subject only to any warranties offered by the manufacturer or product provider, if applicable. NEVER FORGET LLC makes no independent warranties and disclaims liability for product defects or misuse beyond what is required by law.
                    </p>
                </div>
                <p class="terms-text">
                    By accessing or using this website, you acknowledge and agree to the terms outlined in our Terms of Use and Privacy Policy.
                </p>
                <p class="terms-text">
                    For legal inquiries, please contact: [<span> <a href="mailto:disclaimer@neverforgetappreciation.com">disclaimer@neverforgetappreciation.com</a> </span> ]
                </p>
            </div>
        </div>
    </div>
</section> 
 
@endsection
