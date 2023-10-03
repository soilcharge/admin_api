<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});



Route::get('allclear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return "All Cache Clear";
});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post("login", "AuthController@login");
Route::post("login_mobileapp", "AuthController@login_mobileapp");
Route::post("register", "AuthController@register");

Route::any('statelist', 'CommonController@statelist');
Route::post('districtlist', 'CommonController@districtlist');
Route::post('talukalist', 'CommonController@talukalist');
Route::post('villagelist', 'CommonController@villagelist');
Route::post('checkemailexist', 'CommonController@checkemailexist');


// Front Website API
    Route::get('firstmethodlist', 'FrontController@firstmethodlist');
    Route::get('secondrulelist', 'FrontController@secondrulelist');
    Route::get('thirdmeditationlist', 'FrontController@thirdmeditationlist');
    
    Route::get('fronttestimonialslist', 'FrontController@fronttestimonialslist');
    Route::post('fronttestimonialadd', 'FrontController@fronttestimonialadd');
    Route::get('frontaboutuslist', 'FrontController@frontaboutuslist');
    Route::get('frontvisionmissionlist', 'FrontController@frontvisionmissionlist');
    Route::get('frontphotogallerylist', 'FrontController@frontphotogallerylist');
    Route::get('frontphotogallerylistlimit', 'FrontController@frontphotogallerylistlimit');
    Route::get('frontvisionlist', 'FrontController@frontvisionlist');
    Route::get('frontmissionlist', 'FrontController@frontmissionlist');
    Route::get('frontvideogallerylist', 'FrontController@frontvideogallerylist');
    
    Route::get('webvideo_educational', 'FrontController@webvideo_educational');
    Route::get('webvideo_educationallimit', 'FrontController@webvideo_educationallimit');
    Route::get('webvideo_farmer', 'FrontController@webvideo_farmer');
    Route::get('webvideo_farmerlimit', 'FrontController@webvideo_farmerlimit');
    Route::get('webmarquee', 'FrontController@webmarquee');
    
    Route::get('frontblogarticlelist', 'FrontController@frontblogarticlelist');
    Route::get('frontdownloadlist', 'FrontController@frontdownloadlist');
    Route::get('frontproductlist', 'FrontController@frontproductlist');
    Route::get('frontsliderlist', 'FrontController@frontsliderlist');
    Route::get('frontclientlogoslist', 'FrontController@frontclientlogoslist');
    Route::post('frontenquiryadd', 'FrontController@frontenquiryadd');
    // Route::get('frontenquiryget', 'FrontController@frontenquiryget');
    Route::post('frontproductreviewadd', 'FrontController@frontproductreviewadd');
    Route::post('frontproductget', 'FrontController@frontproductget');
    Route::post('frontblogreplyadd', 'FrontController@frontblogreplyadd');
    Route::post('frontinternshipadd', 'FrontController@frontinternshipadd');
    Route::post('frontjobpostingadd', 'FrontController@frontjobpostingadd');
    Route::any('frontdistributorregistration', 'FrontController@frontdistributorregistration');
    Route::get('counter_list', 'FrontController@counter_list');
    Route::get('front_career_list', 'FrontController@front_career_list');
    Route::get('frontagencylist', 'FrontController@frontagencylist');
    
    

Route::group(["middleware" => "auth.jwt"], function () {
    Route::any("logout", "AuthController@logout");
    
    //Farmer API
    Route::any('farmerregistration', 'FarmerController@farmerregistration');
    Route::post('farmerlist', 'FarmerController@farmerlist');
    Route::post('farmerget', 'FarmerController@farmerget');
    Route::post('farmerdelete', 'FarmerController@farmerdelete');
    Route::post('farmerupdate', 'FarmerController@farmerupdate');
    Route::post('farmeractiveinactive', 'FarmerController@farmeractiveinactive');
    Route::post('farmerdetails', 'FarmerController@farmerdetails');
    
    
    //Distributor API
    //Route::any('distributorlogin', 'DistributorController@distributorlogin');
    Route::any('distributorregistration', 'DistributorController@distributorregistration');
    Route::any('distributorregistrationspecific', 'DistributorController@distributorregistrationspecific');
    Route::any('distributorregistration_by_distributor', 'DistributorController@distributorregistration_by_distributor');
    Route::any('distributorregistration_images', 'DistributorController@distributorregistration_images');
    Route::any('distributorregistration_images_update', 'DistributorController@distributorregistration_images_update');
    Route::post('distributorlist', 'DistributorController@distributorlist');
    Route::post('distributorinfo', 'DistributorController@distributorinfo');
    Route::post('distributordelete', 'DistributorController@distributordelete');
    Route::post('distributorupdatenew', 'DistributorController@distributorupdatenew');
    Route::post('distributorupdate', 'DistributorController@distributorupdate');
    Route::post('distributoractiveinactive', 'DistributorController@distributoractiveinactive');
    Route::post('messageview_by_distributor', 'DistributorController@messageview_by_distributor');
    Route::post('complaintview_by_distributor', 'DistributorController@complaintview_by_distributor');
    Route::post('block_distributor', 'DistributorController@block_distributor');
    Route::post('unblock_distributor', 'DistributorController@unblock_distributor');
    Route::post('send_notification', 'DistributorController@send_notofication');
    Route::post('read_notification', 'DistributorController@read_notification');
    Route::post('list_notification', 'DistributorController@list_notification');
    Route::post('distributordetails', 'DistributorController@distributordetails');
    Route::any('distributorchecktoken', 'DistributorController@distributorchecktoken');
    
    Route::post('farmer_registration_distributorapp', 'DistributorController@farmer_registration_distributorapp');
    
    Route::post('farmerunder_distributor', 'DistributorController@farmerunder_distributor');
    Route::post('farmermeetingadd_distributorapp', 'DistributorController@farmermeetingadd_distributorapp');
    Route::post('farmermeetingadd_images_distributorapp', 'DistributorController@farmermeetingadd_images_distributorapp');
    Route::post('farmermeetingadd_images_update_distributorapp', 'DistributorController@farmermeetingadd_images_update_distributorapp');
    Route::post('farmermeetingget_distributorapp', 'DistributorController@farmermeetingget_distributorapp');
    Route::post('farmermeetingupdate_distributorapp', 'DistributorController@farmermeetingupdate_distributorapp');
    Route::post('farmermeetingdelete_distributorapp', 'DistributorController@farmermeetingdelete_distributorapp');
    Route::post('farmermeetinglist_distributorapp', 'DistributorController@farmermeetinglist_distributorapp');
    
    Route::post('distributormeetingadd_distributorapp', 'DistributorController@distributormeetingadd_distributorapp');
    Route::post('distributormeetingadd_images_distributorapp', 'DistributorController@distributormeetingadd_images_distributorapp');
    Route::post('distributormeetingadd_images_update_distributorapp', 'DistributorController@distributormeetingadd_images_update_distributorapp');
    Route::post('distributormeetinglist_distributorapp', 'DistributorController@distributormeetinglist_distributorapp');
    Route::post('distributormeetingperticularget_distributorapp', 'DistributorController@distributormeetingperticularget_distributorapp');
    Route::post('distributormeetingupdate_distributorapp', 'DistributorController@distributormeetingupdate_distributorapp');
    
    //Farmer Visit By Distributor
    Route::post('distributorvisittofarmerlist_distributorapp', 'DistributorController@distributorvisittofarmerlist_distributorapp');
    Route::post('distributorvisittofarmeradd_distributorapp', 'DistributorController@distributorvisittofarmeradd_distributorapp');
    Route::post('distributorvisittofarmeradd_images_distributorapp', 'DistributorController@distributorvisittofarmeradd_images_distributorapp');
    Route::post('distributorvisittofarmeradd_images_update_distributorapp', 'DistributorController@distributorvisittofarmeradd_images_update_distributorapp');
    Route::post('distributorvisittofarmerget_distributorapp', 'DistributorController@distributorvisittofarmerget_distributorapp');
    Route::post('distributorvisittofarmerupdate_distributorapp', 'DistributorController@distributorvisittofarmerupdate_distributorapp');
    Route::post('distributorvisittofarmerdelete_distributorapp', 'DistributorController@distributorvisittofarmerdelete_distributorapp');
    
    
    //Target Video List
    Route::post('distributortargetvideolist_distributorapp', 'DistributorController@distributortargetvideolist_distributorapp');
    Route::post('target_video_watched_by_dist', 'DistributorController@target_video_watched_by_dist');
    
    
    
    //SCT Result
    Route::post('sct_resultadd_distributorapp', 'DistributorController@sct_resultadd_distributorapp');
    Route::post('sct_resultadd_images_distributorapp', 'DistributorController@sct_resultadd_images_distributorapp');
    Route::post('sct_resultadd_images_update_distributorapp', 'DistributorController@sct_resultadd_images_update_distributorapp');
    Route::post('sct_resultlist_distributorapp', 'DistributorController@sct_resultlist_distributorapp');
    
    //Subscriber Target
    Route::post('subscribertargetget_distributorapp', 'DistributorController@subscribertargetget_distributorapp');
    
    //Subscriber
    Route::post('suscriberadd_distributorapp', 'DistributorController@suscriberadd_distributorapp');
    Route::post('suscriberlist_distributorapp', 'DistributorController@suscriberlist_distributorapp');

    Route::post('suscribertarget_distributorapp', 'DistributorController@suscribertarget_distributorapp');
        //New Route For Video View
    Route::post('target_video_viewed_admin', 'DistributorController@target_video_viewed_admin');
    
    
    
    
    //Product List
    Route::post('allproductlist_mobileapp', 'DistributorMobileAppController@allproductlist_mobileapp');
    Route::post('allproductlist_mobileapp_new', 'DistributorMobileAppController@allproductlist_mobileapp_new');
    
    //Order From APP
    Route::post('orderadd_mobileapp', 'DistributorMobileAppController@orderadd_mobileapp');
    Route::post('orderupdate_mobileapp', 'DistributorMobileAppController@orderupdate_mobileapp');
    Route::post('orderget_mobileapp', 'DistributorMobileAppController@orderget_mobileapp');
    Route::post('orderdelete_mobileapp', 'DistributorMobileAppController@orderdelete_mobileapp');
    Route::post('orderlist_mobileapp', 'DistributorMobileAppController@orderlist_mobileapp');
    Route::post('orderdetail_mobileapp', 'DistributorMobileAppController@orderdetail_mobileapp');
 
    
    // Target Video
    Route::post('target_video_viewed_mobileapp', 'DistributorMobileAppController@target_video_viewed_mobileapp');
    Route::post('target_video_not_viewed_mobileapp', 'DistributorMobileAppController@target_video_not_viewed_mobileapp');
    
    Route::post('mytarget_farmercount_mobileapp', 'DistributorControllerNandu@mytarget_farmercount_mobileapp');
    Route::post('mytarget_youtubevideolinkcount_mobileapp', 'DistributorControllerNandu@mytarget_youtubevideolinkcount_mobileapp');
    Route::post('subscriber_count_mobileapp', 'DistributorControllerNandu@subscriber_count_mobileapp');
    Route::post('subscribers_target_count_mobileapp', 'DistributorControllerNandu@subscribers_target_count_mobileapp');
    Route::post('farmer_meeting_search_mobileapp', 'DistributorControllerNandu@farmer_meeting_search_mobileapp');
    Route::post('distributor_meeting_search_mobileapp', 'DistributorControllerNandu@distributor_meeting_search_mobileapp');
    Route::post('farmer_meeting_title_search_mobileapp', 'DistributorControllerNandu@farmer_meeting_title_search_mobileapp');
    Route::post('distributor_meeting_title_search_mobileapp', 'DistributorControllerNandu@distributor_meeting_title_search_mobileapp');
    Route::post('sct_result_search_by_date_mobileapp', 'DistributorControllerNandu@sct_result_search_by_date_mobileapp');
    Route::post('myvisit_date_filter_mobileapp', 'DistributorControllerNandu@myvisit_date_filter_mobileapp');
    Route::post('myvisit_search_by_visitno', 'DistributorControllerNandu@myvisit_search_by_visitno_mobileapp');
    Route::post('ordersearch_by_orderno', 'DistributorControllerNandu@ordersearch_by_orderno_mobileapp');
    Route::post('salesearch_by_orderno', 'DistributorControllerNandu@salesearch_by_orderno_mobileapp');
    
    
    Route::post('messageadd', 'DistributorControllerNandu@messageadd');
    Route::post('messageedit', 'DistributorControllerNandu@messageedit');
    Route::post('messagedelete', 'DistributorControllerNandu@messagedelete');
    Route::post('messageview', 'DistributorControllerNandu@messageview');
    Route::post('messagesearch', 'DistributorControllerNandu@messagesearch');
    Route::post('messagesearchbydate', 'DistributorControllerNandu@messagesearchbydate');
    
    
    
    Route::post('complaintadd', 'DistributorControllerNandu@complaintadd');
    Route::post('complaintedit', 'DistributorControllerNandu@complaintedit');
    Route::post('complaintdelete', 'DistributorControllerNandu@complaintdelete');
    Route::post('complaintview', 'DistributorControllerNandu@complaintview');
    Route::post('complaintsearch', 'DistributorControllerNandu@complaintsearch');
    Route::post('complaintsearchbydate', 'DistributorControllerNandu@complaintsearchbydate');
    

    Route::post('farmer_meeting_delete', 'DistributorControllerNandu@farmer_meeting_delete');
    Route::post('distributor_meeting_delete', 'DistributorControllerNandu@distributor_meeting_delete');
    Route::post('orderlist_by_date_mobileapp', 'DistributorControllerNandu@orderlist_by_date_mobileapp');
    Route::post('videossearch_mobileapp', 'DistributorControllerNandu@videossearch_mobileapp');
    Route::post('video_search_by_date', 'DistributorControllerNandu@video_search_by_date_mobileapp');
    Route::post('bloglist_distributorapp', 'DistributorControllerNandu@bloglist_distributorapp');
    Route::post('sct_result_search_by_title', 'DistributorControllerNandu@sct_result_search_by_title_mobileapp');
    Route::post('languageview', 'DistributorControllerNandu@languageview');
    Route::post('allvideo', 'DistributorControllerNandu@allvideo');
    Route::post('allvideoadd', 'DistributorControllerNandu@allvideoadd');
    Route::post('allvideoupdate', 'DistributorControllerNandu@allvideoupdate');
    Route::post('allvideoget', 'DistributorControllerNandu@allvideoget');
    Route::post('allvideodelete', 'DistributorControllerNandu@allvideodelete');
    Route::post('farmer_under_distributor', 'DistributorControllerNandu@farmer_under_distributor_mobileapp');
    Route::post('distributor_under_distributor', 'DistributorControllerNandu@distributor_under_distributor_mobileapp');
    Route::post('language_brochure_search', 'DistributorControllerNandu@language_brochure_search');
    
    // Sale API
    Route::post('saleadd_mobileapp', 'DistributorControllerNandu@saleadd_mobileapp');
    Route::post('salelist_by_date', 'DistributorControllerNandu@salelist_by_date_mobileapp');
    Route::post('saleget_mobileapp', 'DistributorControllerNandu@saleget_mobileapp');
    Route::post('saledelete_mobileapp', 'DistributorControllerNandu@saledelete_mobileapp');
    Route::post('saleupdate_mobileapp', 'DistributorControllerNandu@saleupdate_mobileapp');
    Route::post('salelist_mobileapp', 'DistributorControllerNandu@salelist_mobileapp');
    Route::post('allsaleproductlist_mobileapp', 'DistributorControllerNandu@allsaleproductlist_mobileapp');
    Route::post('allorderproductlist_by_distributor_mobileapp', 'DistributorControllerNandu@allorderproductlist_by_distributor_mobileapp');
    Route::post('allproductlistofdistributor', 'DistributorControllerNandu@allproductlistofdistributor_mobileapp');
    
    
    
    Route::post('distributortargetvideolistdatefilter_distributorapp', 'DistributorController@distributortargetvideolistdatefilter_distributorapp');
    Route::post('distributortargetvideosearch_distributorapp', 'DistributorController@distributortargetvideosearch_distributorapp');
    Route::post('distributorsearchbrochure_distributorapp', 'DistributorController@distributorsearchbrochure_distributorapp');
    Route::post('distributorsearchlanguage_distributorapp', 'DistributorController@distributorsearchlanguage_distributorapp');
    Route::post('distributortargetvideosearchfromall_distributorapp', 'DistributorController@distributortargetvideosearchfromall_distributorapp');
    Route::post('distributorproductsearch_distributorapp', 'DistributorController@distributorproductsearch_distributorapp');
    Route::post('distributorlistundercount_distributor', 'DistributorController@distributorlistundercount_distributor');
    
    Route::post('articleblogbydatefilter_distributorapp', 'DistributorController@articleblogbydatefilter_distributorapp');
    Route::post('articleblogsearch_distributorapp', 'DistributorController@articleblogsearch_distributorapp');
    Route::post('scheduleblogbydatefilter_distributorapp', 'DistributorController@scheduleblogbydatefilter_distributorapp');
    Route::post('scheduleblogsearch_distributorapp', 'DistributorController@scheduleblogsearch_distributorapp');
    Route::post('distributorvisittofarmercount_distributorapp', 'DistributorController@distributorvisittofarmercount_distributorapp');
    Route::post('farmermeetingcount_distributorapp', 'DistributorController@farmermeetingcount_distributorapp');
    Route::post('sct_resultcount_distributorapp', 'DistributorController@sct_resultcount_distributorapp');
    Route::post('distributortargetvideodatefilter_distributorapp', 'DistributorController@distributortargetvideodatefilter_distributorapp');
    Route::post('subscribertargetgetlist_distributorapp', 'DistributorController@subscribertargetgetlist_distributorapp');
    Route::post('subscribertargetcount_distributorapp', 'DistributorController@subscribertargetcount_distributorapp');
    
    //distributortargetvideosearchfromall_distributorapp
    
    
    
    
    
    
    
    
    
    
    ///////////////////////////////////////////////Common ///////////////////////////////////////////////////////////////////////////////////////
    Route::post('farmergetdetails', 'FarmerController@farmergetdetails');
    Route::post('distributorlistunder_distributor', 'DistributorController@distributorlistunder_distributor');
    Route::post('downloadcontentlist', 'CommonController@downloadcontentlist');
    Route::post('downloadcontent', 'CommonController@downloadcontent');
    
    
    
    
    
    
    
    
    
    ////////////////////////////////////////////// Web ////////////////////////////////////////////////////////////////////////////
    Route::post('distributorvisittofarmerlist_distributorweb', 'DistributorController@distributorvisittofarmerlist_distributorweb');
    Route::post('farmervisitdetails', 'WebAPIController@farmervisitdetails');
    Route::post('getvideodetailsdistributorall', 'DistributorController@getvideodetailsdistributorall');
    
    //Target Video List
    Route::post('distributortargetvideolist_distributorweb', 'DistributorController@distributortargetvideolist_distributorweb');
    Route::post('distributortargetvideoadd_distributorweb', 'DistributorController@distributortargetvideoadd_distributorweb');
    Route::post('distributortargetvideodelete_distributorweb', 'DistributorController@distributortargetvideodelete_distributorweb');
    Route::post('distributortargetvideoget_distributorweb', 'DistributorController@distributortargetvideoget_distributorweb');
    Route::post('distributortargetvideoupdate_distributorweb', 'DistributorController@distributortargetvideoupdate_distributorweb');
    
    //Distributor Meeting List
    Route::post('distributormeetinglist_distributorweb', 'DistributorController@distributormeetinglist_distributorweb');
    Route::post('distributormeetingdetails_distributorweb', 'DistributorController@distributormeetingdetails_distributorweb');
    Route::post('farmermeetinglist_distributorweb', 'DistributorController@farmermeetinglist_distributorweb');
    Route::post('farmermeetingdetails_distributorweb', 'DistributorController@farmermeetingdetails_distributorweb');
    
    //Plot Visit 
    Route::post('plotvisitlist_web', 'WebAPIController@plotvisitlist_web');
    Route::post('plotvisitadd_web', 'WebAPIController@plotvisitadd_web');
    Route::post('plotvisitget_web', 'WebAPIController@plotvisitget_web');
    Route::post('plotvisitupdate_web', 'WebAPIController@plotvisitupdate_web');
    Route::post('plotvisitdelete_web', 'WebAPIController@plotvisitdelete_web');
    
    // Client Logos Add
    Route::post('client_logos_add_web', 'WebAPIController@client_logos_add_web');
    Route::any('client_logoslist', 'WebAPIController@client_logoslist');
    Route::any('client_logosget', 'WebAPIController@client_logosget');
    Route::post('client_logosupdate', 'WebAPIController@client_logosupdate');
    Route::post('client_logosdelete', 'WebAPIController@client_logosdelete');
    
    // Front Career
    Route::post('career_add', 'WebAPIController@career_add');
    Route::any('career_list', 'WebAPIController@career_list');
    Route::any('career_get', 'WebAPIController@career_get');
    Route::post('career_update', 'WebAPIController@career_update');
    
    
    // Front Internship
    Route::any('internship_list', 'WebAPIController@internship_list');
    Route::post('internship_delete', 'WebAPIController@internship_delete');
    Route::any('internship_get', 'WebAPIController@internship_get');
    Route::post('internship_update', 'WebAPIController@internship_update');
    Route::post('download_internship_resume', 'WebAPIController@download_internship_resume');
    
    // Website Marquee
    Route::post('website_marquee_add', 'WebAPIController@website_marquee_add');
    Route::any('website_marquee_list', 'WebAPIController@website_marquee_list');
    Route::any('website_marquee_get', 'WebAPIController@website_marquee_get');
    Route::post('website_marquee_update', 'WebAPIController@website_marquee_update');
    Route::post('website_marquee_delete', 'WebAPIController@website_marquee_delete');
    Route::post('website_marquee_active', 'WebAPIController@website_marquee_active');
    Route::post('website_marquee_inactive', 'WebAPIController@website_marquee_inactive');
    
    
    
    // Front Enquiry
    Route::any('frontenquiryget', 'WebAPIController@frontenquiryget');
    // Front Job Posting
    Route::any('job_posting_list', 'WebAPIController@job_posting_list');
    Route::post('job_posting_delete', 'WebAPIController@job_posting_delete');
    Route::any('job_posting_get', 'WebAPIController@job_posting_get');
    Route::post('job_posting_update', 'WebAPIController@job_posting_update');
    Route::post('download_job_posting_resume', 'WebAPIController@download_job_posting_resume');
    
    // Blog Reply
    Route::any('blog_reply_list', 'WebAPIController@blog_reply_list');
    
    // Product Review
    Route::any('product_review_list', 'WebAPIController@product_review_list');
    
    ////////////////////////////////////////// Web
    //Comapny Profile
    Route::post('companyprofileadd', 'WebAPIController@companyprofileadd');
    Route::post('companyprofilelist', 'WebAPIController@companyprofilelist');
    Route::post('companyprofileget', 'WebAPIController@companyprofileget');
    Route::post('companyprofileupdate', 'WebAPIController@companyprofileupdate');
    Route::post('companyprofiledelete', 'WebAPIController@companyprofiledelete');
    
    //Web About Us
    Route::post('webaboutusadd', 'WebAPIController@webaboutusadd');
    Route::post('webaboutusupdate', 'WebAPIController@webaboutusupdate');
    Route::post('webaboutusget', 'WebAPIController@webaboutusget');
    Route::post('webaboutusdelete', 'WebAPIController@webaboutusdelete');
    Route::post('webaboutuslist', 'WebAPIController@webaboutuslist');
    
    //Web Cover Photo
    Route::post('coverphotoadd', 'WebAPIController@coverphotoadd');
    Route::post('coverphotoupdate', 'WebAPIController@coverphotoupdate');
    Route::post('coverphotoget', 'WebAPIController@coverphotoget');
    Route::post('coverphotodelete', 'WebAPIController@coverphotodelete');
    Route::post('coverphotolist', 'WebAPIController@coverphotolist');
    
     //Web Gallary Photo
    Route::post('gallaryphotoadd', 'WebAPIController@gallaryphotoadd');
    Route::post('gallaryphotoupdate', 'WebAPIController@gallaryphotoupdate');
    Route::post('gallaryphotoget', 'WebAPIController@gallaryphotoget');
    Route::post('gallaryphotodelete', 'WebAPIController@gallaryphotodelete');
    Route::post('gallaryphotolist', 'WebAPIController@gallaryphotolist');
    
     //Web VisionMission Photo
    Route::post('webvisionmissionadd', 'WebAPIController@webvisionmissionadd');
    Route::post('webvisionmissionupdate', 'WebAPIController@webvisionmissionupdate');
    Route::post('webvisionmissionget', 'WebAPIController@webvisionmissionget');
    Route::post('webvisionmissiondelete', 'WebAPIController@webvisionmissiondelete');
    Route::post('webvisionmissionlist', 'WebAPIController@webvisionmissionlist');
    
    // Counter
    Route::post('front_counter_add', 'WebAPIController@front_counter_add');
    Route::post('front_counter_list', 'WebAPIController@front_counter_list');
    Route::post('front_counter_get', 'WebAPIController@front_counter_get');
    Route::post('front_counter_delete', 'WebAPIController@front_counter_delete');
    Route::post('front_counter_update', 'WebAPIController@front_counter_update');
    
    
    
     //Web Video
    Route::post('webvideoadd', 'WebAPIController@webvideoadd');
    Route::post('webvideoupdate', 'WebAPIController@webvideoupdate');
    Route::post('webvideoget', 'WebAPIController@webvideoget');
    Route::post('webvideodelete', 'WebAPIController@webvideodelete');
    Route::post('webvideolist', 'WebAPIController@webvideolist');
    
    
    // Target Videos
    Route::post('webtargetvideoadd', 'WebAPIController@webtargetvideoadd');
    Route::post('webtargetvideoupdate', 'WebAPIController@webtargetvideoupdate');
    Route::post('webtargetvideoget', 'WebAPIController@webtargetvideoget');
    Route::post('webtargetvideodelete', 'WebAPIController@webtargetvideodelete');
    Route::post('webtargetvideolist', 'WebAPIController@webtargetvideolist');
    
    
    // Brochure
    Route::post('webbrochureadd', 'WebAPIController@webbrochureadd');
    Route::post('webbrochureupdate', 'WebAPIController@webbrochureupdate');
    Route::post('webbrochureget', 'WebAPIController@webbrochureget');
    Route::post('webbrochuredelete', 'WebAPIController@webbrochuredelete');
    Route::post('webbrochurelist', 'WebAPIController@webbrochurelist');
    
    //SCT Result
    Route::post('websctresultlist', 'WebAPIController@websctresultlist');
    Route::post('websctresultget', 'WebAPIController@websctresultget');
    
    // Sales By Distributor
    
     //Web Blog Article
    Route::post('webblogarticleadd', 'WebAPIController@webblogarticleadd');
    Route::post('webblogarticleupdate', 'WebAPIController@webblogarticleupdate');
    Route::post('webblogarticleget', 'WebAPIController@webblogarticleget');
    Route::post('webblogarticledelete', 'WebAPIController@webblogarticledelete');
    Route::post('webblogarticlelist', 'WebAPIController@webblogarticlelist');
    
    
    //webblogs Schedule Article
    Route::post('webblogsscheduleadd', 'WebAPIController@webblogsscheduleadd');
    Route::post('webblogsscheduleupdate', 'WebAPIController@webblogsscheduleupdate');
    Route::post('webblogsscheduleget', 'WebAPIController@webblogsscheduleget');
    Route::post('webblogsscheduledelete', 'WebAPIController@webblogsscheduledelete');
    Route::post('webblogsschedulelist', 'WebAPIController@webblogsschedulelist');
    
    
      //web Testimonials
    Route::post('webtestimonialsadd', 'WebAPIController@webtestimonialsadd');
    Route::post('webtestimonialsupdate', 'WebAPIController@webtestimonialsupdate');
    Route::post('webtestimonialsget', 'WebAPIController@webtestimonialsget');
    Route::post('webtestimonialsdelete', 'WebAPIController@webtestimonialsdelete');
    Route::post('webtestimonialslist', 'WebAPIController@webtestimonialslist');
    
    
      //web audio
    Route::post('webaudioadd', 'WebAPIController@webaudioadd');
    Route::post('webaudioupdate', 'WebAPIController@webaudioupdate');
    Route::post('webaudioget', 'WebAPIController@webaudioget');
    Route::post('webaudiodelete', 'WebAPIController@webaudiodelete');
    Route::post('webaudiolist', 'WebAPIController@webaudiolist');
    
      //web product
    Route::post('webproductadd', 'WebAPIController@webproductadd');
    Route::post('webproductupdate', 'WebAPIController@webproductupdate');
    Route::post('webproductget', 'WebAPIController@webproductget');
    Route::post('webproductdelete', 'WebAPIController@webproductdelete');
    Route::post('webproductlist', 'WebAPIController@webproductlist');
    Route::post('webproductlistbyprodname', 'WebAPIController@webproductlistbyprodname');
    
    
         //Web Agency
    Route::post('webagencyadd', 'WebAPIController@webagencyadd');
    Route::post('webagencyupdate', 'WebAPIController@webagencyupdate');
    Route::post('webagencyget', 'WebAPIController@webagencyget');
    Route::post('webagencydelete', 'WebAPIController@webagencydelete');
    Route::post('webagencylist', 'WebAPIController@webagencylist');
    Route::post('webagencydetails', 'WebAPIController@webagencydetails');
    Route::post('webagencyby_lat_long_distance', 'WebAPIController@webagencyby_lat_long_distance');
    
    //Order
    Route::post('weborderadd', 'WebAPIController@weborderadd');
    Route::post('weborderupdate', 'WebAPIController@weborderupdate');
    Route::post('weborderget', 'WebAPIController@weborderget');
    Route::post('weborderdelete', 'WebAPIController@weborderdelete');
    Route::post('weborderlist', 'WebAPIController@weborderlist');
    Route::post('weborderorderdetails', 'WebAPIController@weborderorderdetails');
    
    Route::post('webordergetbydistributorid', 'WebAPIController@webordergetbydistributorid');
    Route::post('webordergetalldetails', 'WebAPIController@webordergetalldetails');
    
    Route::post('weborderaccountsectionverified', 'WebAPIController@weborderaccountsectionverified');
    Route::post('weborderaccountsectionforwardtowarehouse', 'WebAPIController@weborderaccountsectionforwardtowarehouse');
    
    Route::post('weborderlistforwarehouse', 'WebAPIController@weborderlistforwarehouse');
    Route::post('weborderdispatchedfromwarehouse', 'WebAPIController@weborderdispatchedfromwarehouse');
    
    //Report
    Route::post('websalesreport', 'WebAPIController@websalesreport');
    Route::post('reportsales', 'WebAPIController@reportsales');
    Route::post('viewreportsales', 'WebAPIController@viewreportsales');

    

    
    Route::post('webdistributorrderreport', 'WebAPIController@webdistributorrderreport');
    Route::post('weballorderreport', 'WebAPIController@weballorderreport');
    Route::post('weballorderconfirmnotdispatchedreport', 'WebAPIController@weballorderconfirmnotdispatchedreport');
    Route::post('weballorderconfirmdispatchedreport', 'WebAPIController@weballorderconfirmdispatchedreport');
    //Route::post('weballorderreport', 'WebAPIController@weballorderreport');
    Route::post('webdistdashreport', 'WebAPIController@webdistdashreport');
    
    Route::post('webdash_farmer_count', 'WebAPIController@webdash_farmer_count');
    Route::post('webdash_distributor_count', 'WebAPIController@webdash_distributor_count');
    Route::post('webdash_farmer_list', 'WebAPIController@webdash_farmer_list');
    Route::post('webdash_distributor_list', 'WebAPIController@webdash_distributor_list');
    //Route::post('webdash_farmer_sales_count', 'WebAPIController@webdash_farmer_sales_count');
    //Route::post('webdash_distributor_sales_count', 'WebAPIController@webdash_distributor_sales_count');
    Route::post('webdash_sales_count', 'WebAPIController@webdash_sales_count');
    
    Route::post('web_distributor_promotion', 'WebAPIController@web_distributor_promotion');
    Route::post('web_distributor_demotion', 'WebAPIController@web_distributor_demotion');
    
    
    
    Route::post('webdash_counting', 'WebAPIController@webdash_counting');
    Route::post('list_notification_web', 'WebAPIController@list_notification_web');
    
    
    Route::post('fsc_list', 'WebAPIController@fsc_list');
    Route::post('bsc_list', 'WebAPIController@bsc_list');
    Route::post('dsc_list', 'WebAPIController@dsc_list');
    Route::post('subscriber_count_distributor', 'WebAPIController@subscriber_count_distributor');
    Route::post('webfarmerlist', 'WebAPIController@farmerlist');
    Route::post('bsc_list_by_bsc', 'WebAPIController@bsc_list_by_bsc');
    Route::post('dsc_list_by_dsc', 'WebAPIController@dsc_list_by_dsc');
    Route::post('fsc_list_by_fsc', 'WebAPIController@fsc_list_by_fsc');
    
    //front product
    Route::post('frontproductadd', 'WebAPIController@frontproductadd');
    Route::post('frontproductupdate', 'WebAPIController@frontproductupdate');
    Route::post('frontproductget', 'WebAPIController@frontproductget');
    Route::post('frontproductdelete', 'WebAPIController@frontproductdelete');
    Route::post('frontproductlist', 'WebAPIController@frontproductlist');
    
    // Front Distributor List
    Route::post('frontdistributorlist', 'WebAPIController@frontdistributorlist');
    Route::post('approvedistributor', 'WebAPIController@approvedistributor');
    
    
    Route::post('web_frontdistributorinfo', 'WebAPIController@web_frontdistributorinfo');
    Route::post('web_frontdistributorupdate', 'WebAPIController@web_frontdistributorupdate');
    
    // Address Update
    Route::post('address_update', 'WebAPIController@address_update');
    Route::any('address_get', 'WebAPIController@address_get');
    Route::post('address_list', 'DistributorController@address_list');
    
    // Crops
    Route::post('crops_add', 'WebAPIController@crops_add');
    Route::any('crops_list', 'WebAPIController@crops_list');
    Route::any('crops_get', 'WebAPIController@crops_get');
    Route::post('crops_update', 'WebAPIController@crops_update');
    Route::post('cropsdelete', 'WebAPIController@cropsdelete');
    
    
    // Principles Update
    Route::post('principles_update', 'WebAPIController@principles_update');
    Route::any('principles_get', 'WebAPIController@principles_get');
    Route::post('principles_list', 'WebAPIController@principles_list');
    
    //Mobile app Profile
    Route::post('add_profile_data_mobileapp', 'DistributorMobileAppController@add_profile_data_mobileapp');
    Route::post('edit_profile_data_mobileapp', 'DistributorMobileAppController@edit_profile_data_mobileapp');
    Route::post('update_profile_data_mobileapp', 'DistributorMobileAppController@update_profile_data_mobileapp');
    
});
