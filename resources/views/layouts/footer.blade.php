<footer id="footer" class="bg-body text-body-tertiary pt-14 pb-12" data-bs-theme="dark">
    <div class="container">
        <!-- Footer top -->
        <div class="border-bottom">
            <div class="row" data-cues="fadeIn">
                <div class="col-md-12 col-lg-3">
                    <!-- Brand -->
                    <div class="mb-8">
                        <a href="/" class="d-inline-block">
                            <figure>
                                <img class="img-fluid" src="/images/logos/am-drive-logo-blanc-2.svg" alt="chauffeur privé">
                            </figure>
                        </a>
                        <p>
                            <em>{{ __('footer.footer.description') }}</em>
                        </p>
                    </div>
                    <!-- /Brand -->
                </div>
                <div class="col-md-12 col-lg-3">
                    <!-- Contact Info -->
                    <div class="mb-8">
                        <h5 class="h6 mb-3 text-uppercase ff-sub ls-1">{{ __('footer.footer.contact_info.title') }}</h5>
                        <div class="pt-2">
                            <p>
                                <span>{{ __('footer.footer.contact_info.address') }}</span>
                            </p>
                            <p>
                                <span>{{ __('footer.footer.contact_info.phone') }}</span>
                            </p>
                            <p>
                                <span>{{ __('footer.footer.contact_info.email') }}</span>
                            </p>
                            <p>
                                <span>{{ __('footer.footer.contact_info.website') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-2">
                    <div class="mb-8">
                        <h5 class="h6 mb-3 text-uppercase ff-sub ls-1">{{ __('footer.footer.services.title') }}</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.services.links.services.route') }}">{{ __('footer.footer.services.links.services.text') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.services.links.contact.route') }}">{{ __('footer.footer.services.links.contact.text') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="mb-8">
                        <h5 class="h6 mb-3 text-uppercase ff-sub ls-1">{{ __('footer.footer.information.title') }}</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.information.links.legal_notice.route') }}">{{ __('footer.footer.information.links.legal_notice.text') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.information.links.privacy_policy.route') }}">{{ __('footer.footer.information.links.privacy_policy.text') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.information.links.cookie_policy.route') }}">{{ __('footer.footer.information.links.cookie_policy.text') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-body link-hover-primary ps-0 pe-0" href="{{ __('footer.footer.information.links.terms_of_use.route') }}">{{ __('footer.footer.information.links.terms_of_use.text') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-9">
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                    <p>{{ __('footer.footer.copyright') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>


@if (app()->environment('production'))
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-d7af2e96-1d54-4dba-a20b-30f0765b276b" data-elfsight-app-lazy></div>
@endif
