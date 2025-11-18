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
                Privacy Policy
            </h1>
        </div>
    </section>
</main>

<section class="terms-section" data-aos="fade-up">
    <div class="terms-container">
        <div class="terms-content">
            <div class="terms-header">
                <h1 class="terms-title">Privacy Policy</h1> 
            </div>
            
            <div class="terms-text">
                Never Forget Appreciation ("we," "our," or "us") is committed to protecting your privacy and handling your personal information with transparency and respect. This Privacy Policy explains what information we collect, how we use it, and the rights you have in relation to your data when you use our website.
            </div>

            <h2 class="terms-section-title">1. Information We Collect</h2>
            <p class="terms-text">We may collect the following types of information:</p>
            <ul class="terms-list">
                <li><strong>Personal information you provide:</strong> such as your name, email address, phone number, or other contact details when you fill out forms or contact us.</li>
                <li><strong>Usage information:</strong> details about how you interact with our website, such as IP address, browser type, pages visited, and time spent on the site.</li>
                <li><strong>Cookies and similar technologies:</strong> as explained in our Cookie Policy.</li>
            </ul>

            <h2 class="terms-section-title">2. How We Use Your Information</h2>
            <p class="terms-text">We use the information we collect to:</p>
            <ul class="terms-list">
                <li>Operate and maintain our website.</li>
                <li>Respond to your inquiries and provide customer support.</li>
                <li>Improve site performance, security, and user experience.</li>
                <li>Send you updates, marketing communications, or other information (where permitted by law).</li>
                <li>Comply with legal obligations.</li>
            </ul>

            <h2 class="terms-section-title">3. Sharing of Information</h2>
            <p class="terms-text">We do not sell or rent your personal data. We may share information with:</p>
            <ul class="terms-list">
                <li>Service providers who help us operate the site or deliver services (e.g., hosting, analytics).</li>
                <li>Legal authorities if required by law or to protect our rights, safety, or property.</li>
                <li>Business partners only with your consent, where applicable.</li>
            </ul>

            <h2 class="terms-section-title">4. Data Retention</h2>
            <p class="terms-text">
                We retain personal information only as long as necessary for the purposes outlined in this policy, or as required by law.
            </p>

            <h2 class="terms-section-title">5. Your Rights</h2>
            <p class="terms-text">Depending on your location, you may have rights to:</p>
            <ul class="terms-list">
                <li>Access, correct, or delete your personal data.</li>
                <li>Withdraw consent where processing is based on consent.</li>
                <li>Object to or restrict certain processing.</li>
                <li>Request data portability.</li>
            </ul>
            <p class="terms-text">
                To exercise these rights, please contact us at&nbsp;<a href="mailto:privacypolicy@neverforgetappreciation.com">privacypolicy@neverforgetappreciation.com</a>.
            </p>

            <h2 class="terms-section-title">6. Security</h2>
            <p class="terms-text">
                We implement reasonable technical and organizational measures to protect your data. However, no method of transmission or storage is completely secure, and we cannot guarantee absolute security.
            </p>

            <h2 class="terms-section-title">7. Third-Party Links</h2>
            <p class="terms-text">
                Our website may include links to third-party websites. We are not responsible for the privacy practices of those sites and encourage you to review their policies.
            </p>

            <h2 class="terms-section-title">8. Changes to This Policy</h2>
            <p class="terms-text">
                We may update this Privacy Policy from time to time. The latest version will always be posted on this page with the "last updated" date shown at the top.
            </p>

            <h2 class="terms-section-title">9. Contact Us</h2>
            <p class="terms-text">If you have any questions about this Privacy Policy or how your data is handled, please contact us at:</p>

            <div class="contact-info">
                <h3>NEVER FORGET LLC</h3>
                <div class="contact-details">
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <a href="mailto:privacypolicy@neverforgetappreciation.com">privacypolicy@neverforgetappreciation.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
 
@endsection
