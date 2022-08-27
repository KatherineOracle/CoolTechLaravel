<?php
/*
    display cookie notification on the footer when session starts
*/
?>

<div class="modal fade cookies" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notice d-flex justify-content-between align-items-center">
                    <div class="cookie-text">This website uses cookies to personalize content and analyse traffic in order to offer you a better experience. <a href="/legal/privacy"></a></div>
                    <div class="buttons d-flex flex-column flex-lg-row">

                        <a href="{{ route('cookieConsent') }}" class="btn btn-success btn-sm">Accept</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!Cookie::get('cookie-consent'))
<script>
var CookieModal = new bootstrap.Modal(document.getElementById("cookieModal"), {});
document.onreadystatechange = function () {
    CookieModal.show();
};
</script>
@endif
