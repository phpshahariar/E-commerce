@if(Session::get('lang') == 'বাংলা')
    @include('customTemplate.category.include.main_content.main_content_ban')
@elseif(Session::get('lang') == 'नहीं')
    @include('customTemplate.category.include.main_content.main_content_hin')
@else
    @include('customTemplate.category.include.main_content.main_content_eng')
@endif
