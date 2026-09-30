<footer class="footer">
  <div class="shell">
    <div class="footer-grid">
      <div>
        <a href="{{ route('home') }}" class="logo">
          <img src="{{ asset('images/logo-1.png') }}" alt="{{ $siteName }}" loading="lazy">
        </a>
        <ul class="contact-list">
          @if($phone = setting('company_phone'))
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6.5 3h3l1.5 4-2 1.5a12 12 0 0 0 6.5 6.5L17 13l4 1.5v3a2.5 2.5 0 0 1-2.7 2.5C10.4 19.6 4.4 13.6 4 5.7A2.5 2.5 0 0 1 6.5 3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" aria-label="Call {{ $phone }}">{{ $phone }}</a>
          </li>
          @endif
          @if($email = setting('company_email'))
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="2.5" y="5" width="19" height="14" rx="2.5" stroke="currentColor" stroke-width="1.7"/><path d="m3.5 7 8.5 6 8.5-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            {{ $email }}
          </li>
          @endif
        </ul>
        <div class="socials">
          <a href="{{ setting('social_facebook') ?: 'https://www.facebook.com/' }}" target="_blank" rel="noopener noreferrer" aria-label="{{ setting('site_name', 'ZaroSoft') }} on Facebook"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 8h3.5L18 4H14c-3.1 0-5 1.9-5 5v3H6v4h3v8h4v-8h3.5l.5-4H13V9c0-.7.3-1 1-1Z"/></svg></a>
          <a href="{{ setting('social_linkedin') ?: 'https://www.linkedin.com/' }}" target="_blank" rel="noopener noreferrer" aria-label="{{ setting('site_name', 'ZaroSoft') }} on LinkedIn"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.5 3A1.8 1.8 0 1 0 4.5 6.6 1.8 1.8 0 0 0 4.5 3ZM3 8.4h3v12.4H3V8.4Zm5.4 0h2.9v1.7h.05c.4-.75 1.4-1.55 2.9-1.55 3.1 0 3.7 2 3.7 4.7v7.55h-3v-6.7c0-1.6-.03-3.65-2.25-3.65-2.25 0-2.6 1.73-2.6 3.53v6.82h-3V8.4Z"/></svg></a>
        </div>
      </div>

      <div class="footer-col">
        <h4>Pages</h4>
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('services.index') }}">Services</a></li>
          <li><a href="{{ route('portfolio.index') }}">Case Studies</a></li>
          <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
          <li><a href="{{ route('blog.index') }}">Blog</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Solutions</h4>
        <ul>
          <li><a href="{{ route('solutions.index') }}">Industry Solutions</a></li>
          <li><a href="{{ route('products.index') }}">Products</a></li>
          <li><a href="{{ route('ai.index') }}">AI &amp; Automation</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('contact.index') }}">Contact</a></li>
          <li><a href="{{ route('faq.index') }}">FAQ</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.</span>
    </div>
  </div>
</footer>
