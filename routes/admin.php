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
Route::get('/',function () {
    return Redirect::intended('admin/dashboard/this_month');
});

// Route::get('404','backend\AdminController@error_404');
// Route::get('500','backend\AdminController@error_500');
// Route::get('/login',function(){
//     return Redirect::intended('/404-error');
// });

Route::group(['middleware' => 'admin'], function () {

	Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notFound']);
	Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
	
	Route::get('/dashboard/{reportBase}', 'AdminController@dashboard');
	Route::get('/post', 'AdminController@myPost');
	//show admin personal info record
	Route::get('/adminInfo', 'AdminController@adminInfo');

	/*
	|--------------------------------------------------------------------------
	| categories/Product Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains categories/Product Controller Routes
	| 
	|
	*/
	//main listingManufacturer
	Route::get('/manufacturers', 'AdminManufacturerController@manufacturers');
	Route::get('/addmanufacturer', 'AdminManufacturerController@addmanufacturer');
	Route::post('/addnewmanufacturer', 'AdminManufacturerController@addnewmanufacturer');
	Route::get('/editmanufacturer/{id}', 'AdminManufacturerController@editmanufacturer');
	Route::post('/updatemanufacturer', 'AdminManufacturerController@updatemanufacturer');
	Route::post('/deletemanufacturer', 'AdminManufacturerController@deletemanufacturer');

	//main categories
	Route::get('/categories', 'AdminCategoriesController@index');
	Route::get('/addcategory', 'AdminCategoriesController@addCategory');
	Route::post('/addnewcategory', 'AdminCategoriesController@createCategory');
	Route::get('/editcategory/{id}', 'AdminCategoriesController@editCategory');
	Route::post('/updatecategory', 'AdminCategoriesController@updateCategory');
	Route::get('/deletecategory/{id}', 'AdminCategoriesController@deleteCategory');

	//sub categories
	Route::get('/subcategories', 'AdminCategoriesController@subcategories');
	Route::get('/addsubcategory', 'AdminCategoriesController@addSubCategory');
	Route::post('/addnewsubcategory', 'AdminCategoriesController@createSubCategory');
	Route::get('/editsubcategory/{id}', 'AdminCategoriesController@editSubCategory');
	Route::post('/updatesubcategory', 'AdminCategoriesController@updateSubCategory');
	Route::get('/deletesubcategory/{id}', 'AdminCategoriesController@deleteSubCategory');
	
	Route::post('/getajaxcategories', 'AdminCategoriesController@getAjaxCategories');

	//products
	Route::get('/products', 'AdminProductsController@products');
	Route::get('/addproduct', 'AdminProductsController@addProduct');
	Route::post('/add/new/product', 'AdminProductsController@store');

	//add attribute against newly added product
	Route::get('/add/product/attribute/{id}/', 'AdminProductsController@addProductAttribute');

	Route::get('/addproductimages/{id}/', 'AdminProductsController@addProductImages');
	Route::post('/add/new/default/attribute', 'AdminProductsController@addNewDefaultAttribute');
	Route::post('/addnewproductattribute', 'AdminProductsController@storeProductAttribute');
	Route::post('/updateproductattribute', 'AdminProductsController@updateProductAttribute');
	Route::post('/updatedefaultattribute', 'AdminProductsController@updateDefaultAttribute');
	Route::post('/deleteproduct', 'AdminProductsController@deleteproduct');
	Route::post('/deleteproductattribute', 'AdminProductsController@deleteProductAttribute');
	Route::post('/addnewproductimage', 'AdminProductsController@addnewproductimage');
	Route::post('/deletedefaultattribute', 'AdminProductsController@deleteDefaultAttribute');
	Route::post('editproductattribute', 'AdminProductsController@editproductattribute');
	Route::post('editdefaultattribute', 'AdminProductsController@editdefaultattribute');
	Route::post('addnewproductimagemodal', 'AdminProductsController@addnewproductimagemodal');
	Route::post('deleteproductattributemodal', 'AdminProductsController@deleteproductattributemodal');
	Route::post('deletedefaultattributemodal', 'AdminProductsController@deletedefaultattributemodal');

	//product attribute
	Route::post('/addnewproductimage', 'AdminProductsController@storeProductImage');
	Route::post('editproductimage', 'AdminProductsController@editProductImage');
	Route::post('/updateproductimage', 'AdminProductsController@updateProductImage');
	Route::post('/deleteproductimagemodal', 'AdminProductsController@deleteProductImageModal');
	Route::post('/deleteproductimage', 'AdminProductsController@deleteProductImage');
	Route::get('/editproduct/{id}', 'AdminProductsController@editProduct');
	Route::post('/update/product', 'AdminProductsController@updateProduct');	
	Route::post('/getOptions', 'AdminProductsController@getOptions');	
	Route::post('/getOptionsValue', 'AdminProductsController@getOptionsValue');	


	//Attribute
	Route::get('/attributes', 'AdminProductsController@attributes');
	Route::get('/addattributes', 'AdminProductsController@addAttributes');
	Route::post('/addnewattributes', 'AdminProductsController@storeAttributes');
	Route::get('/editattributes/{id}/{language_id}', 'AdminProductsController@editAttributes');
	Route::post('/updateattributes/', 'AdminProductsController@updateAttributes');
	Route::post('/deleteattribute', 'AdminProductsController@deleteAttribute');
	Route::post('/addattributevalue', 'AdminProductsController@addAttributeValue');
	Route::post('/updateattributevalue', 'AdminProductsController@updateAttributeValue');
	Route::post('/checkattributeassociate', 'AdminProductsController@checkattributeassociate');
	Route::post('/checkvalueassociate', 'AdminProductsController@checkvalueassociate');
	Route::post('/deletevalue', 'AdminProductsController@deleteOptionValue');


	//manageAppLabel
	Route::get('/listingAppLabels', 'AdminAppLabelsController@listingAppLabels');
	Route::get('/addappkey', 'AdminAppLabelsController@addappkey');
	Route::post('/addNewAppLabel', 'AdminAppLabelsController@addNewAppLabel');
	Route::get('/editAppLabel/{id}', 'AdminAppLabelsController@editAppLabel');
	Route::post('/updateAppLabel/', 'AdminAppLabelsController@updateAppLabel');
	Route::get('/applabel', 'AdminAppLabelsController@manageAppLabel');


	//customers
	Route::get('/customers', 'AdminCustomersController@customers');
	Route::get('/addcustomers', 'AdminCustomersController@addcustomers');
	Route::post('/addnewcustomers', 'AdminCustomersController@addnewcustomers');


	//add adddresses against customers
	Route::get('/addaddress/{id}/', 'AdminCustomersController@addaddress');
	Route::post('/addNewCustomerAddress', 'AdminCustomersController@addNewCustomerAddress');
	Route::post('/editAddress', 'AdminCustomersController@editAddress');
	Route::post('/updateAddress', 'AdminCustomersController@updateAddress');
	Route::post('/deleteAddress', 'AdminCustomersController@deleteAddress');
	Route::post('/getZones', 'AdminCustomersController@getZones');
	//edit customer
	Route::get('/editcustomers/{id}', 'AdminCustomersController@editcustomers');
	Route::post('/updatecustomers', 'AdminCustomersController@updatecustomers');
	Route::post('/deletecustomers', 'AdminCustomersController@deletecustomers');

	//orders
	Route::get('/orders', 'AdminOrdersController@orders');		
	Route::get('/vieworder/{id}', 'AdminOrdersController@viewOrder');
	Route::post('/updateOrder', 'AdminOrdersController@updateOrder');
	Route::post('/deleteOrder', 'AdminOrdersController@deleteOrder');
	
	//alert setting
	Route::get('/alertsetting', 'AdminSiteSettingController@alertSetting');
	Route::post('/updateAlertSetting', 'AdminSiteSettingController@updateAlertSetting');
	
	//generate application key
	Route::get('/generateKey', 'AdminSiteSettingController@generateKey');

	//countries
	Route::get('/countries', 'AdminTaxController@countries');
	Route::get('/addcountry', 'AdminTaxController@addcountry');
	Route::post('/addnewcountry', 'AdminTaxController@addnewcountry');
	Route::get('/editcountry/{id}', 'AdminTaxController@editcountry');
	Route::post('/updatecountry', 'AdminTaxController@updatecountry');
	Route::post('/deletecountry', 'AdminTaxController@deletecountry');

	//zones
	Route::get('/listingZones', 'AdminTaxController@listingZones');
	Route::get('/addZone', 'AdminTaxController@addZone');
	Route::post('/addNewZone', 'AdminTaxController@addNewZone');
	Route::get('/editZone/{id}', 'AdminTaxController@editZone');
	Route::post('/updateZone', 'AdminTaxController@updateZone');
	Route::post('/deleteZone', 'AdminTaxController@deleteZone');

	//tax class
	Route::get('/taxclass', 'AdminTaxController@taxclass');
	Route::get('/addtaxclass', 'AdminTaxController@addtaxclass');
	Route::post('/addnewtaxclass', 'AdminTaxController@addnewtaxclass');
	Route::get('/edittaxclass/{id}', 'AdminTaxController@edittaxclass');
	Route::post('/updatetaxclass', 'AdminTaxController@updatetaxclass');
	Route::post('/deletetaxclass', 'AdminTaxController@deletetaxclass');

	//tax rate
	Route::get('/taxrates', 'AdminTaxController@taxrates');
	Route::get('/addtaxrate', 'AdminTaxController@addtaxrate');
	Route::post('/addnewtaxrate', 'AdminTaxController@addnewtaxrate');
	Route::get('/edittaxrate/{id}', 'AdminTaxController@edittaxrate');
	Route::post('/updatetaxrate', 'AdminTaxController@updatetaxrate');
	Route::post('/deletetaxrate', 'AdminTaxController@deletetaxrate');

	//shipping setting
	Route::get('/shippingmethods', 'AdminShippingController@shippingMethods');
	Route::get('/upsShipping', 'AdminShippingController@upsShipping');
	Route::post('/updateupsshipping', 'AdminShippingController@updateupsshipping');
	Route::get('/flateRate', 'AdminShippingController@flateRate');
	Route::post('/updateflaterate', 'AdminShippingController@updateflaterate');
	Route::post('/defaultShippingMethod', 'AdminShippingController@defaultShippingMethod');
	Route::get('/shippingDetail/{table_name}', 'AdminShippingController@shippingDetail');
	Route::post('/updateShipping', 'AdminShippingController@updateShipping');
	//Payment setting
	Route::get('/paymentsetting', 'AdminPaymentController@paymentsetting');
	Route::post('/updatePaymentSetting', 'AdminPaymentController@updatePaymentSetting');

	//orders
	Route::get('/orderstatus', 'AdminSiteSettingController@orderstatus');
	Route::get('/addorderstatus', 'AdminSiteSettingController@addorderstatus');
	Route::post('/add/order/status', 'AdminSiteSettingController@addNewOrderStatus');
	Route::get('/editorderstatus/{id}', 'AdminSiteSettingController@editorderstatus');
	Route::post('/update/order/status', 'AdminSiteSettingController@updateOrderStatus');
	Route::post('/deleteOrderStatus', 'AdminSiteSettingController@deleteOrderStatus');
	
	//units
	Route::get('/units', 'AdminSiteSettingController@units');
	Route::get('/addunit', 'AdminSiteSettingController@addunit');
	Route::post('/addnewunit', 'AdminSiteSettingController@addnewunit');
	Route::get('/editunit/{id}', 'AdminSiteSettingController@editunit');
	Route::post('/updateunit', 'AdminSiteSettingController@updateunit');
	Route::post('/deleteunit', 'AdminSiteSettingController@deleteunit');
	
	//setting page
	Route::get('/setting', 'AdminSiteSettingController@setting');
	Route::post('/updateSetting', 'AdminSiteSettingController@updateSetting');
	
	Route::get('/websettings', 'AdminSiteSettingController@webSettings');	
	Route::get('/themeSettings', 'AdminSiteSettingController@themeSettings');			
	Route::get('/appsettings', 'AdminSiteSettingController@appSettings');			
	Route::get('/admobSettings', 'AdminSiteSettingController@admobSettings');		
	Route::get('/facebooksettings', 'AdminSiteSettingController@facebookSettings');
	Route::get('/googlesettings', 'AdminSiteSettingController@googleSettings');	
	Route::get('/applicationapi', 'AdminSiteSettingController@applicationApi');	
	Route::get('/webthemes', 'AdminSiteSettingController@webThemes');
	Route::get('/seo', 'AdminSiteSettingController@seo');		
	Route::get('/customstyle', 'AdminSiteSettingController@customstyle');	
	Route::post('/updateWebTheme', 'AdminSiteSettingController@updateWebTheme');			
	
	//pushNotification
	Route::get('/pushnotification', 'AdminSiteSettingController@pushNotification');	
	
	//language setting
	Route::get('/getlanguages', 'AdminSiteSettingController@getlanguages');
	Route::get('/languages', 'AdminSiteSettingController@languages');
	Route::post('/defaultlanguage', 'AdminSiteSettingController@defaultlanguage');			
	Route::get('/addlanguages', 'AdminSiteSettingController@addlanguages');
	Route::post('/addnewlanguages', 'AdminSiteSettingController@addnewlanguages');
	Route::get('/editlanguages/{id}', 'AdminSiteSettingController@editlanguages');
	Route::post('/updatelanguages', 'AdminSiteSettingController@updatelanguages');
	Route::post('/deletelanguage', 'AdminSiteSettingController@deletelanguage');

	//banners
	Route::get('/banners', 'AdminBannersController@banners');
	Route::get('/addbanner', 'AdminBannersController@addbanner');
	Route::post('/addNewBanner', 'AdminBannersController@addNewBanner');
	Route::get('/editbanner/{id}', 'AdminBannersController@editbanner');
	Route::post('/updateBanner', 'AdminBannersController@updateBanner');
	Route::post('/deleteBanner/', 'AdminBannersController@deleteBanner');
	
	//sliders
	Route::get('/sliders', 'AdminSlidersController@sliders');
	Route::get('/addsliderimage', 'AdminSlidersController@addsliderimage');
	Route::post('/addNewSlide', 'AdminSlidersController@addNewSlide');
	Route::get('/editslide/{id}', 'AdminSlidersController@editslide');
	Route::post('/updateSlide', 'AdminSlidersController@updateSlide');
	Route::post('/deleteSlider/', 'AdminSlidersController@deleteSlider');

	//profile setting
	Route::get('/adminProfile', 'AdminController@adminProfile');
	Route::post('/updateProfile', 'AdminController@updateProfile');
	Route::post('/updateAdminPassword', 'AdminController@updateAdminPassword');

	//reports 
	Route::get('/statscustomers', 'AdminReportsController@statsCustomers');
	Route::get('/statsproductspurchased', 'AdminReportsController@statsProductsPurchased');
	Route::get('/statsproductsliked', 'AdminReportsController@statsProductsLiked');
	Route::get('/productsstock', 'AdminReportsController@productsStock');
	Route::post('/productSaleReport', 'AdminReportsController@productSaleReport');

	//Devices and send notification
	Route::get('/devices', 'AdminNotificationController@devices');
	Route::get('/viewdevices/{id}', 'AdminNotificationController@viewdevices');
	Route::post('/notifyUser/', 'AdminNotificationController@notifyUser');
	Route::get('/notifications/', 'AdminNotificationController@notifications');
	Route::post('/sendNotifications/', 'AdminNotificationController@sendNotifications');
	Route::post('/customerNotification/', 'AdminNotificationController@customerNotification');
	Route::post('/singleUserNotification/', 'AdminNotificationController@singleUserNotification');
	Route::post('/deletedevice/', 'AdminNotificationController@deletedevice');

	//coupons
	Route::get('/coupons', 'AdminCouponsController@coupons');
	Route::get('/addcoupons', 'AdminCouponsController@addcoupons');
	Route::post('/addnewcoupons', 'AdminCouponsController@addnewcoupons');
	Route::get('/editcoupons/{id}', 'AdminCouponsController@editcoupons');
	Route::post('/updatecoupons', 'AdminCouponsController@updatecoupons');
	Route::post('/deletecoupon', 'AdminCouponsController@deletecoupon');
	Route::post('/couponProducts', 'AdminCouponsController@couponProducts');

	//news categories
	Route::get('/newscategories', 'AdminNewsCategoriesController@newscategories');
	Route::get('/addnewscategory', 'AdminNewsCategoriesController@addnewscategory');
	Route::post('/addnewsnewcategory', 'AdminNewsCategoriesController@addnewsnewcategory');
	Route::get('/editnewscategory/{id}', 'AdminNewsCategoriesController@editnewscategory');
	Route::post('/updatenewscategory', 'AdminNewsCategoriesController@updatenewscategory');
	Route::post('/deletenewscategory', 'AdminNewsCategoriesController@deletenewscategory');

	//news
	Route::get('/news', 'AdminNewsController@news');
	Route::get('/addnews', 'AdminNewsController@addnews');
	Route::post('/addnewnews', 'AdminNewsController@addnewnews');
	Route::get('/editnews/{id}', 'AdminNewsController@editnews');
	Route::post('/updatenews', 'AdminNewsController@updatenews');
	Route::post('/deletenews', 'AdminNewsController@deletenews');

	
	//Blogs
	Route::get('/blogs', 'AdminBlogsController@index');
	Route::get('/addblogs', 'AdminBlogsController@addBlogs');
	Route::post('/addnewblogs', 'AdminBlogsController@addNewBlogs');
	Route::get('/editblogs/{id}', 'AdminBlogsController@editBlogs');
	Route::post('/updateblogs', 'AdminBlogsController@updateBlogs');
	Route::post('/deleteblogs', 'AdminBlogsController@deleteBlogs');

	//app pages controller
	Route::get('/pages', 'AdminPagesController@pages');
	Route::get('/addpage', 'AdminPagesController@addpage');
	Route::post('/addnewpage', 'AdminPagesController@addnewpage');
	Route::get('/editpage/{id}', 'AdminPagesController@editpage');
	Route::post('/updatepage', 'AdminPagesController@updatepage');
	Route::get('/pageStatus', 'AdminPagesController@pageStatus');
	
	//site pages controller
	Route::get('/webpages', 'AdminPagesController@webpages');
	Route::get('/addwebpage', 'AdminPagesController@addwebpage');
	Route::post('/addnewwebpage', 'AdminPagesController@addnewwebpage');
	Route::get('/editwebpage/{id}', 'AdminPagesController@editwebpage');
	Route::post('/updatewebpage', 'AdminPagesController@updatewebpage');
	Route::get('/pageWebStatus', 'AdminPagesController@pageWebStatus');
	
	Route::post('/product/feature', 'AdminProductsController@productFeature');
	//***
	//**page section
	//*******
	Route::get('/section', 'AdminPageSectionController@sections');
	Route::get('/addsectionsimages', 'AdminPageSectionController@addSectionsImages');
	Route::post('/add/section', 'AdminPageSectionController@addNewSection');
	Route::get('/edit/section/{id}', 'AdminPageSectionController@editSection');
	Route::post('/update/section', 'AdminPageSectionController@updateSection');
	Route::post('/delete/section/', 'AdminPageSectionController@deleteSection');

	Route::get('/spotlightproduct', 'AdminSpotLightProductController@index');
	Route::post('/update/spotlightproduct', 'AdminSpotLightProductController@updateSpotLightProducts');

});

//log in
Route::get('/login', 'AdminController@login');
Route::post('/checkLogin', 'AdminController@checkLogin');
//log out
Route::get('/logout', 'AdminController@logout');
//});

// });
