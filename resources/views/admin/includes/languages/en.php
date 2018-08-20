 <?php
 function lang($phrase)
 {
	 static $lang=array(
	 //dashboard phrases
	 "lang"=>"Language",
	 "home"=>"Admin Home",
	 "cat" =>"Categories",
	 "edit"=>"Edit profile",
	 "types"=>"Types",
	 "sitting"=>"Sitting",
	 "logout"=>"Log Out",
	 "product"=>"Products",
	 "statis"=>"Statistics",
	 "logs"=>"Logs",
	 "member"=>"Members",
	 "User Name"=>"User Name",
	 "Email"=>"Email",
	 "Password"=>"Password",
	 "Full Name"=>"Full Name",
	 "save"=>"save",
	 "Edit members"=>"Edit members",
	 "comment"=>"Comments",
	 "types"=>"Types",
	 "shop"=>"Visit clothes shopping",
	 "Adminbg"=>"Admin background",
	 "totalM"=>"Total members",
	 "pendingM"=>"Pending members",
	 "totalP"=>"Total products",
	 "totalC"=>"Total comments",
	 "latest"=>"The latest",
	 "register"=>"register",
	 "users"=>"users",
	 "products"=>"products",
	 "categories"=>"categories",
	 "comments"=>"comments",
	 "edit"=>"edit",
	 "delete"=>"delete",
	 "add"=>"add",
	 "activate"=>"activate",
	 "approve"=>"approve",
  //categories page
      "manageCat"=>"Manage Categories",
	  "allCat"=>"All categories",
	  "viewing"=>"Viewing",
	  "full"=>"Full",
	  "classic"=>"Classic",
	  "addCat"=>"add Category",
	  "hidden"=>"Hidden",
	  "commentDis"=>"Comment disabled",
	  "advtmDis"=>"Advertising disabled",
	  //type page
	  "manageT"=>"Manage Types",
	  "allClothType"=>"All clothes types",
	   "type"=>"Types",
	   //product page
	  "manageP"=>"Manage Products",
	  "id"=>"ID",
	  "desc"=>"Description",
	  "typ"=>"Type",
	  "addDate"=>"add Date",
	  "price"=>"Price",
	  "catName"=>"Category name",
	  "userName"=>"User Name",
	  "control"=>"Control",
	  "manageC"=>"Manage Comments",
	  
	  //members page
	  "manageM"=>"manage members",
	  "fullName"=>"Full Name",
	  "email"=>"Email",
	  "regDate"=>"Register date",
	  "addM"=>"Add member",
	  
	  //manage comments
	  "manageC"=>"Manage comments",
	  //offers page
	  "offersP"=>"Offers Page",
	  "discount"=>"Discount",
	  "offerInterval"=>"Offer Interval",
	  "refresh"=>"Refresh",
	  "cancel"=>"Cancel",
	  "addOffer"=>"Add offer",
	  "prodID"=>"ProdID",
	  "remainInterval"=>"Remain Interval",
	  "addDate"=> "Add Date",
 );
	 return $lang[$phrase];
 }
 
 ?>