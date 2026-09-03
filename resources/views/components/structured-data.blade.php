@props(['graph' => []])

@php
    /**
     * Organization + WebSite are emitted on every page; individual pages push
     * extra nodes (Article, FAQPage, BreadcrumbList, …) through `graph`.
     */
    $siteName = setting('site_name', 'ZaroSoft');

    $organization = array_filter([
        '@type' => 'Organization',
        '@id' => url('/') . '#organization',
        'name' => $siteName,
        'url' => url('/'),
        'logo' => asset('images/logo-1.png'),
        'description' => setting('site_description'),
        'email' => setting('company_email'),
        'telephone' => setting('company_phone'),
        'address' => setting('company_address') ? [
            '@type' => 'PostalAddress',
            'streetAddress' => setting('company_address'),
            'addressCountry' => setting('company_country', 'BD'),
        ] : null,
        // The company delivers remotely, so state that rather than letting
        // search engines infer a single local service area.
        'areaServed' => ['@type' => 'Place', 'name' => 'Worldwide'],
        'contactPoint' => array_filter([
            '@type' => 'ContactPoint',
            'contactType' => 'sales',
            'email' => setting('company_email'),
            'telephone' => setting('company_phone'),
            'availableLanguage' => ['English', 'Bengali'],
        ], fn ($value) => !empty($value)),
        'sameAs' => array_values(array_filter([
            setting('social_linkedin'),
            setting('social_github'),
            setting('social_facebook'),
            setting('social_twitter'),
        ])),
    ], fn ($value) => !empty($value));

    $website = [
        '@type' => 'WebSite',
        '@id' => url('/') . '#website',
        'url' => url('/'),
        'name' => $siteName,
        'publisher' => ['@id' => url('/') . '#organization'],
    ];

    $payload = [
        '@context' => 'https://schema.org',
        '@graph' => array_merge([$organization, $website], array_values($graph)),
    ];
@endphp

<script type="application/ld+json">{!! json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
