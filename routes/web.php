<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FontEnd Start


//LanguageController Start

//LanguageController End
Route::get('/bangla', [
    'uses' => 'LanguageController@langBangla',
    'as'   => '/bangla'
]);
Route::get('/hindi', [
    'uses' => 'LanguageController@langHindi',
    'as'   => '/hindi'
]);
Route::get('/english', [
    'uses' => 'LanguageController@langEnglish',
    'as'   => '/english'
]);

//ShopperController Start

Route::get('/shopper-register', [
    'uses' => 'ShopperController@shopperRegister',
    'as'   => '/shopper-register'
]);
Route::post('/save-shopper', [
    'uses' => 'ShopperController@saveShopper',
    'as'   => '/save-shopper'
]);
Route::get('/save-shopper', [
    'uses' => 'ShopperController@shopperRegister',
    'as'   => '/save-shopper'
]);
Route::get('/shopper-login', [
    'uses' => 'ShopperController@shopperLogin',
    'as'   => '/shopper-login'
]);
Route::post('/shopper-login-dashboard', [
    'uses' => 'ShopperController@shopperLoginDashboard',
    'as'   => '/shopper-login-dashboard'
]);
Route::get('/shopper-login-dashboard', [
    'uses' => 'ShopperController@shopperLogin',
    'as'   => '/shopper-login-dashboard'
]);
Route::get('/shopper-dashboard', [
    'uses' => 'ShopperController@shopperDashboard',
    'as'   => '/shopper-dashboard'
]);
Route::get('/shopper-product/{id}', [
    'uses' => 'ShopperController@shopperProduct',
    'as'   => '/shopper-product'
]);

Route::get('/{name}_{id}', [
    'uses' => 'ShopperController@shopperUrl',
    'as'   => '/shopper-shop'
]);


//ShopperControler End

//CustomController Start

Route::get('/', [
    'uses' => 'CustomController@index',
    'as'   => '/'
]);
Route::get('/product-page', [
    'uses' => 'CustomController@productPage',
    'as'   => '/product-page'
]);
Route::get('/view-product-by-category/{id}', [
    'uses' => 'CustomController@categoryPage',
    'as'   => '/view-product-by-category'
]);
Route::get('/view-product-by-subCategory/{id}', [
    'uses' => 'CustomController@subcategoryPage',
    'as'   => '/view-product-by-subCategory'
]);
Route::get('/view-product-by-brand/{id}', [
    'uses' => 'CustomController@viewProductByBrand',
    'as'   => '/view-product-by-brand'
]);
Route::get('/product-view-by-id/{id}', [
    'uses' => 'CustomController@viewProductById',
    'as'   => '/product-view-by-id'
]);
Route::get('/register-customer', [
    'uses' => 'CustomController@registerCustomer',
    'as'   => '/register-customer'
]);
Route::get('/register-newcustomer', [
    'uses' => 'CustomController@registerCustomer',
    'as'   => '/register-newcustomer'
]);
Route::post('/register-newcustomer', [
    'uses' => 'CustomController@registerNewCustomer',
    'as'   => '/register-newcustomer'
]);
Route::get('/customer-logout', [
    'uses' => 'CustomController@customerLogout',
    'as'   => '/customer-logout'
]);
Route::get('/customer-login', [
    'uses' => 'CustomController@registerCustomer',
    'as'   => '/customer-login'
]);
Route::post('/customer-login', [
    'uses' => 'CustomController@customerLogin',
    'as'   => '/customer-login'
]);
Route::get('/billing', [
    'uses' => 'CustomController@billing',
    'as'   => '/billing'
]);
Route::get('/shipping', [
    'uses' => 'CustomController@shipping',
    'as'   => '/shipping'
]);
Route::get('/payment', [
    'uses' => 'CustomController@payment',
    'as'   => '/payment'
]);
Route::get('/cart', [
    'uses' => 'CustomController@cart',
    'as'   => '/cart'
]);
Route::post('/save-billing-info', [
    'uses' => 'CustomController@saveBillingInfo',
    'as'   => '/save-billing-info'
]);
Route::get('/save-billing-info', [
    'uses' => 'CustomController@billing',
    'as'   => '/save-billing-info'
]);
Route::post('/save-shipping', [
    'uses' => 'CustomController@saveShipping',
    'as'   => '/save-shipping'
]);
Route::get('/save-shipping', [
    'uses' => 'CustomController@shipping',
    'as'   => '/save-shipping'
]);
Route::get('/save-payment', [
    'uses' => 'CustomController@payment',
    'as'   => '/save-payment'
]);
Route::post('/save-payment', [
    'uses' => 'CustomController@savePayment',
    'as'   => '/save-payment'
]);
Route::get('/success', [
    'uses' => 'CustomController@success',
    'as'   => '/success'
]);
Route::get('/manage-charge-country', [
    'uses' => 'CustomController@manageChargeCountry',
    'as'   => '/manage-charge-country'
]);
Route::get('/manage-charge-division', [
    'uses' => 'CustomController@manageChargeDivision',
    'as'   => '/manage-charge-division'
]);
Route::get('/download-invoice/{id}', [
    'uses' => 'CustomController@downloadInvoice',
    'as'   => '/download-invoice'
]);
Route::get('/view-all-categories', [
    'uses' => 'CustomController@viewAllCategories',
    'as'   => '/view-all-categories'
]);
Route::get('/view-sub-category/{id}', [
    'uses' => 'CustomController@viewSubCategory',
    'as'   => '/view-sub-category'
]);


//customController end

//cartController Start
Route::post('/add-to-cart', [
    'uses' => 'CartController@addToCart',
    'as'   => '/add-to-cart'
]);
Route::get('/add-to-cart', [
    'uses' => 'CustomController@cart',
    'as'   => '/add-to-cart'
]);

Route::post('/add-to-cart-ban', [
    'uses' => 'CartController@addToCartBan',
    'as'   => '/add-to-cart-ban'
]);
Route::get('/add-to-cart-ban', [
    'uses' => 'CustomController@cart',
    'as'   => '/add-to-cart-ban'
]);

Route::post('/add-to-cart-hin', [
    'uses' => 'CartController@addToCartHin',
    'as'   => '/add-to-cart-hin'
]);
Route::get('/add-to-cart-hin', [
    'uses' => 'CustomController@cart',
    'as'   => '/add-to-cart-hin'
]);


Route::get('/remove-cart', [
    'uses' => 'CartController@removeCart',
    'as'   => '/remove-cart'
]);
Route::get('/update-cart-blur', [
    'uses' => 'CartController@updateCartBlur',
    'as'   => '/update-cart-blur'
]);

Route::post('/update-cart', [
    'uses' => 'CartController@updateCart',
    'as'   => '/update-cart'
]);

Route::get('/update-cart', [
    'uses' => 'CustomController@cart',
    'as'   => '/update-cart'
]);

Route::get('/order-status-chack', [
    'uses' => 'CustomController@orderStausChack',
    'as'   => '/order-status-chack'
]);

//CartController End



//Start AdminController

Route::get('/dash-board', [
    'uses' => 'AdminController@showDashboard',
    'as'   => '/dash-board'
]);
Route::get('/login', [
    'uses' => 'AdminController@showLogin',
    'as'   => '/login'
]);
Route::post('/login-admin', [
    'uses' => 'AdminController@adminLogin',
    'as'   => '/login-admin'
]);
Route::get('/login-admin', [
    'uses' => 'AdminController@showLogin',
    'as'   => '/login-admin'
]);
Route::get('/logout', [
    'uses' => 'AdminController@logout',
    'as'   => '/logout'
]);
Route::get('/customer-list', [
    'uses' => 'AdminController@customerList',
    'as'   => '/customer-list'
]);
Route::get('/delete-customer-by-id/{id}', [
    'uses' => 'AdminController@deleteCustomer',
    'as'   => '/delete-customer-by-id'
]);
Route::get('/order-list', [
    'uses' => 'AdminController@orderList',
    'as'   => '/order-list'
]);
Route::get('/view-order-details/{id}', [
    'uses' => 'AdminController@viewOrderDetails',
    'as'   => '/view-order-details'
]);
Route::get('/edite-customer-by-id', [
    'uses' => 'AdminController@editeCustomer',
    'as'   => '/edite-customer-by-id'
]);
Route::get('/update-customer', [
    'uses' => 'AdminController@customerList',
    'as'   => '/update-customer'
]);
Route::post('/update-customer', [
    'uses' => 'AdminController@updateCustomer',
    'as'   => '/update-customer'
]);


//End AdminController
//OrderController Start
Route::get('/success-order/{id}', [
    'uses' => 'OrderController@successOrder',
    'as'   => '/success-order'
]);
Route::get('/pending-order/{id}', [
    'uses' => 'OrderController@pendingOrder',
    'as'   => '/pending-order'
]);

Route::post('/order-send-to-shopper', [
    'uses' => 'OrderController@orderSendToShopper',
    'as'   => '/order-send-to-shopper'
]);
Route::get('/delete-order/{id}', [
    'uses' => 'OrderController@deleteOrder',
    'as'   => '/delete-order'
]);
Route::get('/view-shopper-order/{id}', [
    'uses' => 'OrderController@viewShopperOrder',
    'as'   => '/view-shopper-order'
]);
Route::get('/view-order-details_shopper_for_admin/{id}', [
    'uses' => 'OrderController@viewOrderDetailsShopperForAdmin',
    'as'   => '/view-order-details_shopper_for_admin'
]);
Route::get('/delevery-order', [
    'uses' => 'OrderController@deleveryOrder',
    'as'   => '/delevery-order'
]);
Route::get('/shopper-order-list', [
    'uses' => 'OrderController@shopperOrderList',
    'as'   => '/shopper-order-list'
]);
Route::get('/shopper-delevered-list', [
    'uses' => 'OrderController@shopperDeleveredList',
    'as'   => '/shopper-delevered-list'
]);
Route::post('/customser_update_form_order_details', [
    'uses' => 'OrderController@customerUpdateFormOrderDetails',
    'as'   => '/customser_update_form_order_details'
]);
Route::post('/shipping_update_form_order_details', [
    'uses' => 'OrderController@shippingUpdateFormOrderDetails',
    'as'   => '/shipping_update_form_order_details'
]);
Route::post('/payment_update_form_order_details', [
    'uses' => 'OrderController@paymentUpdateFormOrderDetails',
    'as'   => '/payment_update_form_order_details'
]);
Route::post('/product_update_form_order_details', [
    'uses' => 'OrderController@productUpdateFormOrderDetails',
    'as'   => '/product_update_form_order_details'
]);
Route::get('/delete-product-form-order/{id}', [
    'uses' => 'OrderController@deleteProductFormOrder',
    'as'   => '/delete-product-form-order'
]);
Route::post('/update-order-details', [
    'uses' => 'OrderController@updateOrderDetails',
    'as'   => '/update-order-details'
]);


//OrderController End

//AccountController Start
Route::get('/view-shopper-history/{id}', [
    'uses' => 'AccountController@viewShopperHistory',
    'as'   => '/view-shopper-history'
]);
Route::post('/update-shopper-payment', [
    'uses' => 'AccountController@updateShopperPayment',
    'as'   => '/update-shopper-payment'
]);


//AccountController End

//InvoiceController Start
Route::get('/show-invoice/{id}', [
    'uses' => 'InvoiceController@showInvoice',
    'as'   => '/show-invoice'
]);

//InvoiceController End

//DynamicpageController Start
Route::get('/dynamic-page', [
    'uses' => 'DynamicpageController@dynamicPage',
    'as'   => '/dynamic-page'
]);
Route::post('/save-new-page', [
    'uses' => 'DynamicpageController@saveNewPage',
    'as'   => '/save-new-page'
]);
Route::get('/save-new-page', [
    'uses' => 'DynamicpageController@dynamicPage',
    'as'   => '/save-new-page'
]);
Route::get('/unpublish-page/{id}', [
    'uses' => 'DynamicpageController@unpublishPage',
    'as'   => '/unpublish-page'
]);
Route::get('/publish-page/{id}', [
    'uses' => 'DynamicpageController@publishPage',
    'as'   => '/publish-page'
]);
Route::post('/update-page', [
    'uses' => 'DynamicpageController@updatePage',
    'as'   => '/update-page'
]);
Route::get('/update-page', [
    'uses' => 'DynamicpageController@dynamicPage',
    'as'   => '/update-page'
]);
Route::get('/delete-page/{id}', [
    'uses' => 'DynamicpageController@deletePage',
    'as'   => '/delete-page'
]);

//frontEnd
Route::get('/offer-page/{id}/{name}', [
    'uses' => 'DynamicpageController@offerPage',
    'as'   => '/offer-page'
]);



//DynamicpageController End

//SettingController Start

Route::get('/slider', [
    'uses' => 'SettingController@slider',
    'as'   => '/slider'
]);
Route::get('/save-slider', [
    'uses' => 'SettingController@slider',
    'as'   => '/save-slider'
]);
Route::post('/save-slider', [
    'uses' => 'SettingController@saveSlider',
    'as'   => '/save-slider'
]);
Route::get('/unpublish-slider/{id}', [
    'uses' => 'SettingController@unpublishSlider',
    'as'   => '/unpublish-slider}'
]);
Route::get('/publish-slider/{id}', [
    'uses' => 'SettingController@publishSlider',
    'as'   => '/publish-slider'
]);
Route::get('/delete-slider/{id}', [
    'uses' => 'SettingController@deleteSlider',
    'as'   => '/delete-slider'
]);
Route::get('/logo', [
    'uses' => 'SettingController@logo',
    'as'   => '/logo'
]);
Route::post('/save-logo', [
    'uses' => 'SettingController@saveLogo',
    'as'   => '/save-logo'
]);

Route::get('/save-logo', [
    'uses' => 'SettingController@logo',
    'as'   => '/save-logo'
]);
Route::get('/unpublish-logo/{id}', [
    'uses' => 'SettingController@unpublishLogo',
    'as'   => '/unpublish-logo'
]);
Route::get('/publish-logo/{id}', [
    'uses' => 'SettingController@publishLogo',
    'as'   => '/publish-logo'
]);
Route::get('/delete-logo/{id}', [
    'uses' => 'SettingController@deleteLogo',
    'as'   => '/delete-logo'
]);
Route::get('/info', [
    'uses' => 'SettingController@info',
    'as'   => '/info'
]);
Route::post('/save-info', [
    'uses' => 'SettingController@saveInfo',
    'as'   => '/save-info'
]);
Route::get('/save-info', [
    'uses' => 'SettingController@info',
    'as'   => '/save-info'
]);


//SettingController End

//

//MemberCartController Start

Route::get('/member-cart', [
    'uses' => 'MemberCartController@memberCart',
    'as'   => '/member-cart'
]);
Route::post('/save-member', [
    'uses' => 'MemberCartController@saveMember',
    'as'   => '/save-member'
]);

Route::get('/save-member', [
    'uses' => 'MemberCartController@memberCart',
    'as'   => '/save-member'
]);

Route::get('/publish-member-cart/{id}', [
    'uses' => 'MemberCartController@publishMemberCart',
    'as'   => '/publish-member-cart'
]);

Route::get('/unpublish-member-cart/{id}', [
    'uses' => 'MemberCartController@unpublishMemberCart',
    'as'   => '/publish-member-cart'
]);

Route::get('/edite-memberCart', [
    'uses' => 'MemberCartController@editeMemberCart',
    'as'   => '/edite-memberCart'
]);

Route::get('/update-memberCart', [
    'uses' => 'MemberCartController@memberCart',
    'as'   => '/update-memberCart'
]);

Route::post('/update-memberCart', [
    'uses' => 'MemberCartController@updateMemberCart',
    'as'   => '/update-memberCart'
]);

Route::get('/delete-memberCart/{id}', [
    'uses' => 'MemberCartController@deleteMemberCart',
    'as'   => '/delete-memberCart'
]);
Route::get('/memberCart-discount', [
    'uses' => 'MemberCartController@memberCartDiscount',
    'as'   => '/memberCart-discount'
]);



//MemberCartController End


//SearchController Start
Route::post('/search', [
    'uses' => 'SearchController@search',
    'as'   => '/search'
]);
Route::get('/search', [
    'uses' => 'SearchController@searchGet',
    'as'   => '/search'
]);
Route::get('/search-suggestion', [
    'uses' => 'SearchController@searchSuggestion',
    'as'   => '/search-suggestion'
]);
Route::post('/search-back-product', [
    'uses' => 'SearchController@searchBackProduct',
    'as'   => '/search-back-product'
]);
Route::get('/search-back-product', function (){
    return redirect('/product');
});

Route::post('/search-back-order-list', [
    'uses' => 'SearchController@searchBackOrderList',
    'as'   => '/search-back-order-list'
]);
Route::post('/search-back-develery-order', [
    'uses' => 'SearchController@searchBackDeliveryOrder',
    'as'   => '/search-back-develery-order'
]);
Route::post('/search-shopper-order-list', [
    'uses' => 'SearchController@searchShopperOrderList',
    'as'   => '/search-shopper-order-list'
]);
Route::post('/search-shopper-delevery-list', [
    'uses' => 'SearchController@searchShopperDeleveryList',
    'as'   => '/search-shopper-delevery-list'
]);
Route::post('/search-customer', [
    'uses' => 'SearchController@searchCustomer',
    'as'   => '/search-customer'
]);
Route::post('/search-user', [
    'uses' => 'SearchController@searchUser',
    'as'   => '/searh-user'
]);
Route::post('/search-country', [
    'uses' => 'SearchController@searchCountry',
    'as'   => '/search-country'
]);
Route::post('/search-division', [
    'uses' => 'SearchController@searchDivision',
    'as'   => '/search-division'
]);
Route::post('/search-memberCart', [
    'uses' => 'SearchController@searchMemberCart',
    'as'   => '/search-memberCart'
]);
Route::post('/search-extra-income', [
    'uses' => 'SearchController@searchExtraIncome',
    'as'   => '/search-extra-income'
]);
Route::post('/search-expense', [
    'uses' => 'SearchController@searchExpense',
    'as'   => '/search-expense'
]);

Route::get('/search-back-order-list', function (){
    return redirect('/order-list');
});
Route::get('/search-back-develery-order', function (){
    return redirect('/delevery-order');
});
Route::get('/search-shopper-order-list', function (){
    return redirect('/shopper-order-list');
});
Route::get('/search-shopper-delevery-list', function (){
    return redirect('/shopper-delevery-list');
});
Route::get('/search-customer', function (){
    return redirect('/customer-list');
});
Route::get('/search-user', function (){
    return redirect('/register');
});
Route::get('/search-country', function (){
    return redirect('/country');
});
Route::get('/search-division', function (){
    return redirect('/division');
});
Route::get('/search-memberCart', function (){
    return redirect('/member-cart');
});
Route::get('/search-extra-income', function (){
    return redirect('/extra-income');
});
Route::get('/search-expense', function (){
    return redirect('/expense');
});


Route::post('/search-by-date-shopper-history', [
    'uses' => 'SearchController@searchByDateShopperHistory',
    'as'   => '/search-by-date-shopper-history'
]);

Route::get('/search-by-date-shopper-history', function (){
    return back();
});



//SearchController End

//strat ProductController

Route::get('/product', [
    'uses' => 'ProductController@showProduct',
    'as'   => '/product'
]);
Route::get('/manage-categories', [
    'uses' => 'ProductController@manageSubCategorie',
    'as'   => '/manage-categories'
]);
Route::post('save-product', [
    'uses' => 'ProductController@saveProduct',
    'as'   => 'save-product'
]);
Route::get('save-product', [
    'uses' => 'ProductController@showProduct',
    'as'   => 'save-product'
]);
Route::get('/unpublish-product/{id}', [
    'uses' => 'ProductController@unpublishedProduct',
    'as'   => '/unpublish-product'
]);
Route::get('/publish-product/{id}', [
    'uses' => 'ProductController@publishedProduct',
    'as'   => '/publish-product'
]);
Route::get('/view-product/{id}', [
    'uses' => 'ProductController@viewProduct',
    'as'   => '/view-product'
]);
Route::get('/delete-image', [
    'uses' => 'ProductController@deleteImage',
    'as'   => '/delete-image'
]);
Route::post('/update-image', [
    'uses' => 'ProductController@UpdateImage',
    'as'   => '/update-image'
]);
Route::get('/update-view-product', [
    'uses' => 'ProductController@UpdateViewProduct',
    'as'   => '/update-view-product'
]);
Route::post('update-product', [
    'uses' => 'ProductController@UpdateProduct',
    'as'   => 'update-product'
]);
Route::get('update-product', function () {
    return redirect('/product');
});
Route::get('/delete-product-by-id/{id}', [
    'uses' => 'ProductController@deleteProduct',
    'as'   => '/delete-product-by-id'
]);

//End ProductController

//start CategoriesController
Route::get('/main-categories', [
    'uses' => 'CategoriesController@showMainCategories',
    'as'   => '/main-categories'
]);
Route::get('/sub-categories', [
    'uses' => 'CategoriesController@showSubCategories',
    'as'   => '/sub-categories'
]);

Route::post('save-main-category',[
    'uses' => 'CategoriesController@saveMainCategories',
    'as'   => 'save-main-categories'
]);
Route::get('save-main-category',[
    'uses' => 'CategoriesController@showMainCategories',
    'as'   => 'save-main-categories'
]);
Route::get('/publish-category-by-id/{id}',[
    'uses' => 'CategoriesController@publishCategory',
    'as'   => '/publish-category-by-id'
]);
Route::get('/unpublish-category-by-id/{id}',[
    'uses' => 'CategoriesController@unpublishCategory',
    'as'   => '/publish-category-by-id'
]);
Route::get('/edite-categories-by-id',[
    'uses' => 'CategoriesController@editeCategoryById',
    'as'   => '/edite-categories-by-id'
]);
Route::post('update-main-category',[
    'uses' => 'CategoriesController@updateCategory',
    'as'   => '/edite-categories-by-id'
]);
Route::get('update-main-category',[
    'uses' => 'CategoriesController@showMainCategories',
    'as'   => '/edite-categories-by-id'
]);
Route::get('/delete-category-by-id/{id}',[
    'uses' => 'CategoriesController@deleteCategories',
    'as'   => '/delete-category-by-id'
]);


//End CategoriesController

//start LocationController


Route::get('/country',[
    'uses' => 'LocationController@showCountry',
    'as'   => '/country'
]);
Route::post('save-country',[
    'uses' => 'LocationController@saveCountry',
    'as'   => 'save-country'
]);
Route::get('save-country',[
    'uses' => 'LocationController@showCountry',
    'as'   => 'save-country'
]);

Route::get('/unpublish-country-by-id/{id}',[
    'uses' => 'LocationController@unpublishCountry',
    'as'   => '/unpublish-country-by-id'
]);
Route::get('/publish-country-by-id/{id}',[
    'uses' => 'LocationController@publishCountry',
    'as'   => '/publish-country-by-id'
]);
Route::get('/edite-country-by-id',[
    'uses' => 'LocationController@editeCountry',
    'as'   => '/edite-country-by-id'
]);
Route::post('update-country',[
    'uses' => 'LocationController@updateCountry',
    'as'   => 'update-country'
]);
Route::get('update-country',[
    'uses' => 'LocationController@showCountry',
    'as'   => 'update-country'
]);
Route::get('/delete-country-by-id/{id}',[
    'uses' => 'LocationController@deleteCountry',
    'as'   => '/delete-country-by-id'
]);


Route::get('/division',[
    'uses' => 'LocationController@showDivision',
    'as'   => '/division'
]);

Route::get('/district',[
    'uses' => 'LocationController@showDistrict',
    'as'   => '/district'
]);
Route::get('/sub-district',[
    'uses' => 'LocationController@showSubDistrict',
    'as'   => '/sub-district'
]);
Route::post('save-division',[
    'uses' => 'LocationController@saveDivision',
    'as'   => 'save-division'
]);
Route::get('save-division',[
    'uses' => 'LocationController@showDivision',
    'as'   => 'save-division'
]);
Route::get('/publish-division-by-id/{id}',[
    'uses' => 'LocationController@publishDivision',
    'as'   => '/publish-division-by-id'
]);
Route::get('/unpublish-division-by-id/{id}',[
    'uses' => 'LocationController@unpublishDivision',
    'as'   => '/unpublish-division-by-id'
]);
Route::get('/edite-division-by-id',[
    'uses' => 'LocationController@editeDivision',
    'as'   => '/edite-division-by-id'
]);
Route::post('update-division',[
    'uses' => 'LocationController@updateDivision',
    'as'   => 'update-division'
]);
Route::get('/delete-division-by-id/{id}',[
    'uses' => 'LocationController@deleteDivision',
    'as'   => '/delete-division-by-id'
]);

//district
Route::get('/district',[
    'uses' => 'LocationController@showDistrict',
    'as'   => '/district'
]);
Route::post('save-district',[
    'uses' => 'LocationController@saveDistrict',
    'as'   => 'save-district'
]);
Route::get('save-district',[
    'uses' => 'LocationController@showDistrict',
    'as'   => 'save-district'
]);
Route::get('/unpublish-district-by-id/{id}',[
    'uses' => 'LocationController@unpublishDistrict',
    'as'   => '/unpublish-district-by-id'
]);
Route::get('/publish-district-by-id/{id}',[
    'uses' => 'LocationController@publishDistrict',
    'as'   => '/publish-district-by-id'
]);
Route::get('/edite-district-by-id',[
    'uses' => 'LocationController@editeDistrict',
    'as'   => '/edite-district-by-id'
]);
Route::post('update-district',[
    'uses' => 'LocationController@updateDistrict',
    'as'   => 'update-district'
]);
Route::get('update-district',[
    'uses' => 'LocationController@showDistrict',
    'as'   => 'update-district'
]);
Route::get('/delete-district-by-id/{id}',[
    'uses' => 'LocationController@deleteDistrict',
    'as'   => '/delete-district-by-id'
]);
Route::get('/manage-division',[
    'uses' => 'LocationController@manageDivision',
    'as'   => '/manage-division'
]);

//end district

// start sub_district
Route::get('/sub-district',[
    'uses' => 'LocationController@showSubDistrict',
    'as'   => '/sub-district'
]);
Route::get('/manage-district',[
    'uses' => 'LocationController@manageDistrict',
    'as'   => '/manage-district'
]);
Route::post('save-sub-district',[
    'uses' => 'LocationController@saveSubDistrict',
    'as'   => 'save-sub-district'
]);
Route::get('save-sub-district',[
    'uses' => 'LocationController@showSubDistrict',
    'as'   => 'save-sub-district'
]);
Route::get('/unpublish-sub-district-by-id/{id}',[
    'uses' => 'LocationController@unpublishSubDistrict',
    'as'   => '/unpublish-sub-district-by-id'
]);
Route::get('/publish-sub-district-by-id/{id}',[
    'uses' => 'LocationController@publishSubDistrict',
    'as'   => '/publish-sub-district-by-id'
]);
Route::get('/edite-sub-district-by-id',[
    'uses' => 'LocationController@editeSubDistrict',
    'as'   => '/edite-sub-district-by-id'
]);
Route::post('update-sub-district',[
    'uses' => 'LocationController@updateSubDistrict',
    'as'   => 'update-sub-district'
]);
Route::get('update-sub-district',[
    'uses' => 'LocationController@showSubDistrict',
    'as'   => 'update-sub-district'
]);
Route::get('/delete-sub-district-by-id/{id}',[
    'uses' => 'LocationController@deleteSubDistrict',
    'as'   => '/delete-sub-district-by-id'
]);

//end sub_district

//end LocationController

//start SubCategoriesController

Route::get('/sub-categories',[
    'uses' => 'SubCategoriesController@showSubCategories',
    'as'   => '/edite-categories-by-id'
]);
Route::post('/save-sub-category',[
    'uses' => 'SubCategoriesController@saveSubCategory',
    'as'   => '/edite-categories-by-id'
]);
Route::get('/unpublish-sub-category-by-id/{id}',[
    'uses' => 'SubCategoriesController@unpublishSubCategory',
    'as'   => '/unpublish-sub-category-by-id'
]);
Route::get('/publish-sub-category-by-id/{id}',[
    'uses' => 'SubCategoriesController@publishSubCategory',
    'as'   => '/publish-sub-category-by-id'
]);
Route::get('/edite-sub-category-by-id',[
    'uses' => 'SubCategoriesController@editeSubCategory',
    'as'   => '/edite-sub-category-by-id'
]);
Route::post('/update-sub-category',[
    'uses' => 'SubCategoriesController@updateSubCategory',
    'as'   => '/update-sub-category'
]);
Route::get('/update-sub-category',[
    'uses' => 'SubCategoriesController@showSubCategories',
    'as'   => '/update-sub-category'
]);
Route::get('/delete-sub-category-by-id/{id}',[
    'uses' => 'SubCategoriesController@deleteSubCategories',
    'as'   => '/delete-sub-category-by-id'
]);

//end SubCategoriesController

//start BrandController

Route::get('/show-brand',[
    'uses' => 'BrandController@showBrand',
    'as'   => '/show-brand'
]);
Route::post('/save-brand',[
    'uses' => 'BrandController@saveBrand',
    'as'   => '/show-brand'
]);
Route::get('/save-brand',[
    'uses' => 'BrandController@showBrand',
    'as'   => '/show-brand'
]);
Route::get('/unpublish-brand-by-id/{id}',[
    'uses' => 'BrandController@unpublishBrand',
    'as'   => '/unpublish-brand-by-id'
]);
Route::get('/publish-brand-by-id/{id}',[
    'uses' => 'BrandController@publishBrand',
    'as'   => '/publish-brand-by-id'
]);
Route::get('/edite-brand-by-id',[
    'uses' => 'BrandController@editeBrandById',
    'as'   => '/edite-brand-by-id'
]);
Route::post('update-brand',[
    'uses' => 'BrandController@updateBrandById',
    'as'   => '/update-brand'
]);
Route::get('update-brand',[
    'uses' => 'BrandController@showBrand',
    'as'   => '/update-brand'
]);
Route::get('/delete-brand-by-id/{id}',[
    'uses' => 'BrandController@deleteBrand',
    'as'   => '/delete-brand-by-id'
]);

//end BrandController

//Strat AdminUserController

Route::get('/register',[
    'uses' => 'AdminUserController@register',
    'as'   => '/register'
]);
Route::get('/manage-sub-district',[
    'uses' => 'AdminUserController@manageSubDistrict',
    'as'   => '/manage-sub-district'
]);
Route::post('save-user',[
    'uses' => 'AdminUserController@saveUser',
    'as'   => 'save-user'
]);
Route::get('save-user',[
    'uses' => 'AdminUserController@register',
    'as'   => 'save-user'
]);
Route::get('unpublish-user-by-id/{id}',[
    'uses' => 'AdminUserController@unpublishUser',
    'as'   => 'unpublish-user-by-id'
]);
Route::get('publish-user-by-id/{id}',[
    'uses' => 'AdminUserController@publishUser',
    'as'   => 'unpublish-user-by-id'
]);
Route::get('/edite-user-by-id',[
    'uses' => 'AdminUserController@editeUser',
    'as'   => '/edite-user-by-id'
]);
Route::post('update-user',[
    'uses' => 'AdminUserController@updateUser',
    'as'   => 'update-user'
]);
Route::get('update-user',[
    'uses' => 'AdminUserController@register',
    'as'   => 'update-user'
]);
Route::get('/delete-user-by-id/{id}',[
    'uses' => 'AdminUserController@deleteUser',
    'as'   => '/delete-user-by-id'
]);
Route::get('/manage-sub-district',[
    'uses' => 'AdminUserController@manageSubDistrict',
    'as'   => '/manage-sub-district'
]);


//End AdminUserController

//extraIncomeController start

Route::get('/extra-income',[
    'uses' => 'ExtraIncomeController@extraIncome',
    'as'   => '/extra-income'
]);

Route::get('/save-extraIncome',[
    'uses' => 'ExtraIncomeController@extraIncome',
    'as'   => '/save-extraIncome'
]);

Route::post('/save-extraIncome',[
    'uses' => 'ExtraIncomeController@saveExtraIncome',
    'as'   => '/save-extraIncome'
]);
Route::get('/unpublish-extraIncome/{id}',[
    'uses' => 'ExtraIncomeController@unpublishedExtraIncome',
    'as'   => '/unpublish-extraIncome'
]);
Route::get('/publish-extraIncome/{id}',[
    'uses' => 'ExtraIncomeController@publishedExtraIncome',
    'as'   => '/publish-extraIncome'
]);
Route::get('/edite-extraIncome',[
    'uses' => 'ExtraIncomeController@editeExtraIncome',
    'as'   => '/edite-extraIncome'
]);
Route::post('/update-extraIncome',[
    'uses' => 'ExtraIncomeController@updateExtraIncome',
    'as'   => '/update-extraIncome'
]);
Route::get('/update-extraIncome',[
    'uses' => 'ExtraIncomeController@extraIncome',
    'as'   => '/update-extraIncome'
]);
Route::get('/delete-extraIncome/{id}',[
    'uses' => 'ExtraIncomeController@deleteExtraIncome',
    'as'   => '/delete-extraIncome'
]);

//extraIncomeController end

Route::get('/expense',[
    'uses' => 'ExpenseController@expense',
    'as'   => '/expense'
]);
Route::get('/save-expense',[
    'uses' => 'ExpenseController@expense',
    'as'   => '/save-expense'
]);
Route::post('/save-expense',[
    'uses' => 'ExpenseController@saveExpense',
    'as'   => '/save-expense'
]);
Route::get('/unpublish-expense/{id}',[
    'uses' => 'ExpenseController@unpublishedExpense',
    'as'   => '/unpublish-expense'
]);
Route::get('/publish-expense/{id}',[
    'uses' => 'ExpenseController@publishedExpense',
    'as'   => '/publish-expense'
]);
Route::get('/edite-expense',[
    'uses' => 'ExpenseController@editeExpense',
    'as'   => '/edite-expense'
]);
Route::get('/update-expense',[
    'uses' => 'ExpenseController@expense',
    'as'   => '/update-expense'
]);
Route::post('/update-expense',[
    'uses' => 'ExpenseController@updateExpense',
    'as'   => '/update-expense'
]);
Route::get('/delete-expense/{id}',[
    'uses' => 'ExpenseController@deleteExpense',
    'as'   => '/delete-expense'
]);


//expenseController Start


//expenseController End

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


//LoginController Start

Route::get('/login/facebook', 'LoginController@redirectToFacebookProvider');

Route::get('/login/facebook/callback', 'LoginController@handleProviderFacebookCallback');

//LoginController End


//EventImageController Start

Route::get('/event-image',[
    'uses' => 'EventImageController@EventImage',
    'as'   => '/event-image'
]);

Route::post('/add-event-image',[
    'uses' => 'EventImageController@AddEventImage',
    'as'   => '/add-event-image'
]);

Route::get('/add-event-image',[
    'uses' => 'EventImageController@EventImage',
    'as'   => '/add-event-image'
]);

Route::get('/unpublish-event-image/{id}',[
    'uses' => 'EventImageController@UnpublishedEventImage',
    'as'   => '/unpublish-event-image'
]);
Route::get('/publish-event-image/{id}',[
    'uses' => 'EventImageController@PublishedEventImage',
    'as'   => '/publish-event-image'
]);
Route::post('/update-event-image',[
    'uses' => 'EventImageController@UpdateEventImage',
    'as'   => '/update-event-image'
]);
Route::get('/delete-event-image/{id}',[
    'uses' => 'EventImageController@DeleteEventImage',
    'as'   => '/delete-event-image'
]);


//EventImageController End
//Single Page start//

Route::get('/index', 'AffliteController@index');
Route::get('/afflite/{id}', 'AffliteController@view_allflite');
Route::get('/afflite-product-view/{id}', 'AffliteController@view_affiliate_product');
Route::get('/afflite-category-product/{id}', 'AffliteController@view_affiliate_category');
Route::post('/afflite-add-cart', 'AffliteController@add_cart');
Route::get('/afflite-cart-page', 'AffliteController@cart_page');
Route::get('/register-affiliate-customer', 'AffliteController@register_affiliate_customer');
Route::post('/register-new-customer', 'AffliteController@register_new_customer');
Route::post('/login-customer', 'AffliteController@login_customer');


//Single Page end//