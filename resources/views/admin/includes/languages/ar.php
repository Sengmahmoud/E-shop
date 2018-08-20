 <?php
 function lang($phrase)
 {
	 static $lang=array(
	 //dashboard phrases
	 "lang"=>"اللغة",
	 "home"=>"صفحة المسؤل",
	 "cat"=>"الاقسام",
	 "edit"=>"تعديل الصورة الشخصية",
	 "sitting"=>"الاعدادات",
	 "logout"=>"الخروج",
     "types"=>"الانواع",
     "product"=>"المنتجات",
	 "statis"=>"الاحصائيات",
	 "logs"=>"الزيارت",
	 "member"=>"الأعضاء",
	 "User Name"=>"أسم المستخدم",
	 "Email"=>"الأيميل",
	 "Password"=>"كلمة السر",
	 "Full Name"=>"الأسم بالكامل",
	 "save"=>"حفظ",
	 "Edit members"=>"اضافة الاعضاء",
	 "comment"=>"التعليقات",
	 "type"=>"الأنواع",
	 "shop"=>"الذهاب الى صفحة التسوق",
     "Adminbg"=>"صفحة المسؤل",
	 "totalM"=>"جميع الاعضاء",
	 "pendingM"=>"الاعضاء المعلقة",
	 "totalP"=>"جميع المنتجات",
	 "totalC"=>"جميع التعليقات",
	 "latest"=>"اخر",
	 "register"=>"مضافة",
	 "users"=>"اعضاء",
	 "products"=>"منتجات",
	 "comments"=>"تعليقات",
	 "categories"=>"اقسام",
	 "edit"=>"تعديل",
	 "delete"=>"خذف",
	 "add"=>"اضافة",
	 "activate"=>"تفعيل",
	 "approve"=>"موافقة",
	 /////category page
     "manageCat"=>"ادارة الاقسام",
	  "allCat"=>"كل الاقسام",
	  "viewing"=>"العرض",
	  "full"=>"كلى",
	  "classic"=>"تقليدى",
	  "addCat"=>"اضافة قسم",
	  "hidden"=>"مخفى",
	  "commentDis"=>"تعطيل التعليقات",
	  "advtmDis"=>"تعطيل الاعلانات",
	  
	  //product page
	  "manageP"=>"ادارة المنتجات",
      "id"=>"الرقم التسلسلى",
	  "desc"=>"الوصف",
	  "typ"=>"النوع",
	  "addDate"=>"تاريخ الاضافة",
	  "price"=>"السعر",
	  "catName"=>"اسم القسم",
	  "userName"=>"اسم العضو",
	  "control"=>"التحكم",
	  //members page
	  "manageM"=>"ادارة الاعضاء",
	  "fullName"=>"الاسم بالكامل",
	  "email"=>"البريد",
	  "regDate"=>"وقت التسجيل",
	  "addM"=>"اضافة عضو",
	  //type page
	  "manageT"=>"ادارة انواع الملابس",
	  "allClothType"=>"كل انواع الملابس",
	  
	  //manage comments
	  "manageC"=>"ادارة التعليقات",
	  //offers page
	  "offersP"=>"صفحة العروض",
	  "discount"=>"خصم",
	  "offerInterval"=>"مدة العرض",
	  "refresh"=>"تحديث",
	  "cancel"=>"الغاء",
	  "addOffer"=>"اضافة عرض",
	  "prodID"=>"تسلسل النتج",
	  "remainInterval"=>"الفترة المتبقية",
	  "addDate"=> "تاريخ الاضافة",
 );
	 return $lang[$phrase];
 }
 
 ?>