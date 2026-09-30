<section class="footer-section">
  <div class="footer-top">
    <div class="footer-left">
      <img loading="lazy" src="{{ asset('images/logo-1.png') }}" alt="{{ setting('site_name', 'ZaroSoft') }} logo" class="footer-logo">
      <div class="footer-contact-list">
        @if($phone = setting('company_phone'))
        <div class="footer-contact-item">
          <img width="20" height="20" alt="" src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69cc2a2ef7c32a6e5d8c6041_phone.svg" loading="lazy">
          <p class="footer-contact-text"><a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" aria-label="Call {{ $phone }}">{{ $phone }}</a></p>
        </div>
        @endif
        @if($email = setting('company_email'))
        <div class="footer-contact-item">
          <img width="20" height="20" alt="" src="https://cdn.prod.website-files.com/69976e6486f35ebce739573f/69cc2a2eb85366d6c7a7e4b9_envelope.svg" loading="lazy">
          <p class="footer-contact-text">{{ $email }}</p>
        </div>
        @endif
      </div>
      <div class="footer-social">
        <a href="{{ setting('social_facebook') ?: 'https://www.facebook.com/' }}" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="{{ setting('site_name', 'ZaroSoft') }} on Facebook" style="color:var(--text-heading)"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 8h3.5L18 4H14c-3.1 0-5 1.9-5 5v3H6v4h3v8h4v-8h3.5l.5-4H13V9c0-.7.3-1 1-1Z"/></svg></a>
        <a href="{{ setting('social_linkedin') ?: 'https://www.linkedin.com/' }}" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="{{ setting('site_name', 'ZaroSoft') }} on LinkedIn" style="color:var(--text-heading)"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 8.5H3V21h3.5V8.5ZM4.75 3A2.05 2.05 0 1 0 4.75 7.1 2.05 2.05 0 0 0 4.75 3ZM21 13.8c0-3.8-2-5.6-4.7-5.6-2.2 0-3.2 1.2-3.7 2v-1.7H9.1V21h3.5v-6.2c0-1.6.3-3.1 2.3-3.1 2 0 2 1.8 2 3.2V21H21v-7.2Z"/></svg></a>
      </div>
    </div>

    <div class="footer-links-grid">
      <div class="footer-link-column">
        <p class="footer-column-title">Pages</p>
        <div class="footer-link-list">
          <a href="{{ route('home') }}" class="footer-link">Home</a>
          <a href="{{ route('services.index') }}" class="footer-link">Services</a>
          <a href="{{ route('portfolio.index') }}" class="footer-link">Case Studies</a>
          <a href="#pricing" class="footer-link">Pricing</a>
          <a href="{{ route('blog.index') }}" class="footer-link">Blog</a>
        </div>
      </div>
      <div class="footer-link-column">
        <p class="footer-column-title">Solutions</p>
        <div class="footer-link-list">
          <a href="{{ route('solutions.index') }}" class="footer-link">Industry Solutions</a>
          <a href="{{ route('products.index') }}" class="footer-link">Products</a>
          <a href="{{ route('ai.index') }}" class="footer-link">AI &amp; Automation</a>
        </div>
      </div>
      <div class="footer-link-column">
        <p class="footer-column-title">Company</p>
        <div class="footer-link-list">
          <a href="{{ route('about') }}" class="footer-link">About</a>
          <a href="{{ route('contact.index') }}" class="footer-link">Contact</a>
          <a href="{{ route('faq.index') }}" class="footer-link">FAQ</a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p class="footer-powered">© <span id="year">{{ date('Y') }}</span> {{ setting('site_name', 'ZaroSoft') }}. All rights reserved.</p>
  </div>
</section>
