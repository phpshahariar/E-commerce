@if(Session::get('lang') == 'বাংলা')
    @include('customTemplate.shopperPage.include.main_content.main_content_ban')
@elseif(Session::get('lang') == 'नहीं')
    @include('customTemplate.shopperPage.include.main_content.main_content_hin')
@else
    @include('customTemplate.shopperPage.include.main_content.main_content_eng')
@endif
