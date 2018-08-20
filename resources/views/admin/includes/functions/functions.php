<?php 
/* this page echo the page title*/
function getTitle()
{
	global $pageTitle;
	if(isset($pageTitle))
	{
		echo $pageTitle;
	}
	else 
	{
		echo 'default';
	}
	
}

function checkOfferInterval()
{
	global $conn;
	$stmt=$conn->prepare("delete from offers where remainInterval=0 or remainInterval<0");
    $stmt->execute();
}

function getDiffTime($offerID)
{
	global $conn;
	$stmt=$conn->prepare("select (year(now())-year(addDate)) as y,
	                             (month(now())-month(addDate)) as m,
                                 (day(now())-day(addDate)) as d	
								  from offers where ID=?");
    $stmt->execute(array($offerID));
	return $stmt->fetch();
}

function updateInterval($id,$interval,$remaininter)
{
	global $conn;
	$stmt=$conn->prepare("update offers set offerInterval=?,remainInterval=? where ID=?");
    $stmt->execute(array($interval,$remaininter,$id));
}

function getDayes($y,$m,$d)
{
	if($m>0)
	{
		if($d>0)
		{
			return $y*365+$m*30+$d;
		}
		else if($d==0)
		{
		    return $y*365+$m*30;	
		}
		else
		{
			return $y*365+($m-1)*30+(30+$d);
		}
	}
	else if($m==0)
	{
		if($d>0)
		{
			return $y*365+$d;
		}
		else if($d==0)
		{
		    return $y*365;	
		}
		else
		{
			return ($y-1)*365+(365+$d);
		} 
	}
	else
	{
		if($d>0)
		{
			return ($y-1)*365+(12+$m)+$d;
		}
		else if($d==0)
		{
		    return ($y-1)*365+(12+$m);	
		}
		else
		{
			return ($y-1)*365+(11+$m)+(30+$d);
		} 
	}
}

/*
**get itemInfo function v1.0
** this function return information about 
**particular item for item in database
*/
function itemInfo($table,$item,$value)
{
	global $conn;
	$stmt=$conn->prepare("select * from $table where $item=?");
    $stmt->execute(array($value));
	return $stmt->fetch();
}


/*
**getAllOffers function v1.0
** this function return information about 
**all offers for all products in database
*/
function getAllOffers()
{
	global $conn;
	$stmt=$conn->prepare("select offers.* ,products.Name as prodName from offers join products on products.ID=offers.productID");
    $stmt->execute();
	return $stmt->fetchAll();
}


/*
**getAllProducts function v1.0
** this function return information about 
**all products in database
*/
function getAllProducts()
{
	global $conn;
	$stmt=$conn->prepare("select * from products");
    $stmt->execute();
	return $stmt->fetchAll();
}

function getImage($id)
{
    global $conn;
	$stmt=$conn->prepare("select Image from products where ID=?");
    $stmt->execute(array($id));
	return $stmt->fetch()['Image'];	
}

/*showProductBox*/
function validateAdvtm($userID,&$errors)
 {
	 global $conn;
         if($userID==null)
		 {
		 $description=(isset($_POST['description']))?$_POST['description']:null;
		 $price=(isset($_POST['price']))?$_POST['price']:null;
		 }
		 else
		 {
	     $description= $_POST['description'];
		 $price=$_POST['price'];
		 $name=$_POST['name'];
		 $country=$_POST['country'];
		 $rating=4;
		 $catid=$_POST['categories'];
		 $fashion=$_POST['fashion'];
		 $style=$_POST['style'];
		 $material=$_POST['material'];
		 $season=$_POST['season'];
		 $gender=$_POST['gender'];
		 $color=$_POST['color'];
		 $size=$_POST['size'];
		 $mark=$_POST['mark'];
		 }
		 $error=false;
//making 
    if(isset($description))
	{
		//get only the string [remove any tage or special mark]
		$description=filter_var($description,FILTER_SANITIZE_STRING);
		str_replace(array('/','\\','<','>'),'',$description);
		if(strlen($description)<10)
		{
			$errors[]="the discription lenght must be minimum 10 characters";
		}
	}
	if(isset($price))
	{
		//get only the numbers [remove any tage or special mark]
		$price=filter_var($price,FILTER_SANITIZE_NUMBER_INT);
		if(!is_numeric($price))
		{
			$errors[]="the Price must be numeric";
		}
		else if(empty($price))
		{
			$errors[]="please enter price for product";
		}
	}
	if(isset($country))
	{
		//get only the string [remove any tage or special mark]
		$country=filter_var($country,FILTER_SANITIZE_STRING);
		str_replace(array('/','\\','<','>'),'',$country);
		if(strlen($country)<2)
		{
			$errors[]="the country lenght must be minimum 10 characters";
		}
	}
		  
		  //there are errors in form
 if(empty($errors)&&$userID!=null)
 {
	 $executed=insertAdvtm($userID);//check if insertion exected or no
	  if(!$executed)
	  {
		  $errors[]="please try again may be there are problem with server";
	  }
 }
  
  
 }
function showImage($action="?do=add")
{
	echo "<div class='imagePos'>";
	  echo '<form id="form" action="'.$action.'" method="post" enctype="multipart/form-data">';
        echo '<input  type="file" name="pic" id="file"/>';
	  echo '<input class="btn btn-primary" type="submit" value="Upload image" name="upload" id="upload"/>';
    echo'</form>';
	echo "</div>";
}
 
 function InsertAdvtm ($userID)
{         
         global $conn;
	     $name=$_POST['name'];
		 $description=$_POST['description'];
		 $price=$_POST['price'];
		 $country=$_POST['country'];
		 $rating=4;
		 $catid=$_POST['categories'];
		 $fashion=$_POST['fashion'];
		 $style=$_POST['style'];
		 $material=$_POST['material'];
		 $season=$_POST['season'];
		 $gender=$_POST['gender'];
		 $color=$_POST['color'];
		 $size=$_POST['size'];
		 $mark=$_POST['mark'];
 
		   
	         $stmt=$conn->prepare("insert into products (Name,Description,Mark,Size,Price,countryMade,Fashion,Rating,addDate,
			 categoryID,memberID,Color,Season,Material,Style,Gender) values(?,?,?,?,?,?,?,?,now(),?,?,?,?,?,?,?)");
             $stmt->execute(array($name,$description,$mark,$size,$price,$country,$fashion,$rating,$catid,$userID
			 ,$color,$season,$material,$style,$gender));
			 //$stmt return true if insetion executed
			 //return no if there are no execution
  	  		  return $stmt;
}



/*
**userform v1.0 function to show the form off adding user
*/
function userForm($userid,$uname,$pass,$email,$full,$action,$pageName,$btnName,$passRequired=true)
{
	?>
		 <div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <form class="form-horizontal" action=<?php echo $action;?> method=POST>
		 <input type="hidden" name="userID" value=<?php echo $userid; ?>>
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">User Name</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="text" <?php $val=($uname==null)?"":$uname;echo "value='".$val."'"; ?> name="username" class="form-control" autocomplete="off" required="required" placeholder="User Name"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Password</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="password" <?php $val=($pass==null)?"":$pass;echo "value='".$val."'"; ?> name="password" class="form-control" autocomplete="new-password" placeholder="password" <?php  if($passRequired==true) echo "required='required'"; ?>/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Email</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="email" <?php $val=($email==null)?"":$email;echo "value='".$val."'"; ?> name="email" class="form-control" required="required" placeholder="Email"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Full Name</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="text" <?php $val=($full==null)?"":$full;echo "value='".$val."'"; ?> name="fullname" class="form-control" required="required" placeholder="Full Name"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <div class="col-sm-offset-2 col-sm-10">
		 <input type="submit" <?php $val=($btnName==null)?'':$btnName;echo "value='".$val."'"; ?> class="btn btn-primary btn-lg"/>
		 </div>
		 </div>
		 </form>
		 </div>
		 <?php
}

/*
**commnetform function v1.0 to show the form off editting comment user
*/
function commentForm($commentID,$comment,$action,$pageName,$btnName)
{
	?>
		 <div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <form class="form-horizontal" action=<?php echo $action;?> method=POST>
		 <input type="hidden" name="commentID" value=<?php echo $commentID; ?>>
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Comment</label>
		 <div class="col-sm-10 col-md-4">
		 <textarea class="form-control" name="comment"><?php echo $comment ?></textarea>
		 </div>
		 </div>
		 
		   
		 <div class="form-group form-group-lg">
		 <div class="col-sm-offset-2 col-sm-10">
		 <input type="submit" <?php $val=($btnName==null)?'':$btnName;echo "value='".$val."'"; ?> class="btn btn-primary btn-lg"/>
		 </div>
		 </div>
		 </form>
		 </div>
		 <?php
}


/*
**categoryform v1.0 function to show the form off adding category
*/
function categoryForm($catID,$name,$nameAr,$description,$ordering,$visibility=0,$allowAdvtm=0,$allowComment=0,$action,$pageName,$btnName)
{
	?>
		 <div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <form class="form-horizontal" action=<?php echo $action;?> method=POST>
		 <input type="hidden" name="catID" value=<?php echo $catID; ?>>
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Category Name</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="text" <?php $val=($name==null)?"":$name;echo "value='".$val."'"; ?> name="name" class="form-control" autocomplete="off" required="required" placeholder="Category name"/>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Category NameAr</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="text" <?php $val=($nameAr==null)?"":$nameAr;echo "value='".$val."'"; ?> name="nameAr" class="form-control" autocomplete="off" required="required" placeholder="Category name"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Description</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="description" <?php $val=($description==null)?"":$description;echo "value='".$val."'"; ?> name="description" class="form-control"  placeholder="Descripe the category"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">ordering</label>
		 <div class="col-sm-10 col-md-4">
		 <input type="ordering" <?php $val=($ordering==null)?"":$ordering;echo "value='".$val."'"; ?> name="ordering" class="form-control" placeholder="Enter the ordering number of the category"/>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Visible</label>
		 <div class="col-sm-10 col-md-4">
		  <div>
		    <input id="vis-yes" type="radio" name="visibility" value="<?php echo $visibility.'"'; if($visibility==0) echo "checked";?>/>
			<label for="vis-yes">Yes</label>
		  </div>
		   <div>
		    <input id="vis-no" type="radio" name="visibility" value="<?php echo (1-$visibility).'"'; if($visibility==1) echo "checked";?>/>
			<label for="vis-no">No</label>
		  </div>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Allow comminting</label>
		 <div class="col-sm-10 col-md-4">
		  <div>
		    <input id="com-yes" type="radio" name="comment" value="<?php echo $allowComment.'"'; if($allowComment==0) echo "checked";?>/>
			<label for="com-yes">Yes</label>
		  </div>
		   <div>
		    <input id="com-no" type="radio" name="comment" value="<?php echo (1-$allowComment).'"'; if($allowComment==1) echo "checked";?>/>
			<label for="com-no">No</label>
		  </div>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Allow Advtmertising</label>
		 <div class="col-sm-10 col-md-4">
		  <div>
		    <input id="Advtm-yes" type="radio" name="Advtm" value="<?php echo $allowAdvtm.'"'; if($allowAdvtm==0) echo "checked";?>/>
			<label for="Advtm-yes">Yes</label>
		  </div>
		   <div>
		    <input id="Advtm-no" type="radio" name="Advtm" value="<?php echo (1-$allowAdvtm).'"'; if($allowAdvtm==1) echo "checked";?>/>
			<label for="Advtm-no">No</label>
		  </div>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <div class="col-sm-offset-2 col-sm-10">
		 <input type="submit" <?php $val=($btnName==null)?'':$btnName;echo "value='".$val."'"; ?> class="btn btn-primary btn-lg"/>
		 </div>
		 </div>
		 </form>
		 </div>
		 <?php
}


/*
**categoryform v1.0 function to show the form off adding category
*/
function offerForm($offerID,$prodID,$offerDescription,$discount,$discountInterval,$action,$pageName,$btnName)
{
	?>
		 <div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <form class="form-horizontal" action=<?php echo $action;?> method=POST>
         <input type="hidden" name="offerID" value="<?php echo $offerID?>">
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">product ID</label>
		 <div class="col-sm-10 col-md-4">
		  <select class="offerSelect" name="prodID">
		    <?php 
			 foreach(getAllProducts() as $row)
			 {
				 $select=($prodID!=$row['ID'])?"":"selected";
				 echo "<option value='".$row['ID']."' $select>".$row['ID']."</option>";
			 }
			?>
		  </select>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Offer Description</label>
		 <div class="col-sm-10 col-md-4">
		 <textarea type="text"  name="offerDescription" class="form-control" autocomplete="off"required="required" 
		 placeholder="Offer Description"><?php if($offerDescription!=null) echo $offerDescription;?></textarea>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Discount</label>
		 <div class="col-sm-10 col-md-4">
		  <select class="offerSelect" name="discount">
		  <?php
		    for($i=1;$i<100;$i++)
			{
				$select=($discount!=$i)?"":"selected";
				echo "<option value='".$i."' $select>".$i."%</option>";
			}
		  ?>
		  </select>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <label class="col-sm-2 control-label">Diacount interval</label>
		 <div class="col-sm-10 col-md-4">
		   <select class="offerSelect"  name="discountInterval">
		  <?php
		    for($i=1;$i<1000;$i++)
			{
				$select=($discountInterval!=$i)?"":"selected";
				$day=($i==1)?"Day":"Days";
				echo "<option value='".$i."' $select>".$i."$day</option>";
			}
		  ?>
		  </select>
		 </div>
		 </div>
		 
		  <div class="form-group form-group-lg">
		 <div class="col-sm-offset-2 col-sm-10">
		 <input type="submit" <?php $val=($btnName==null)?'':$btnName;echo "value='".$val."'"; ?> class="btn btn-primary btn-lg"/>
		 </div>
		 </div>
		 </form>
		 </div>
		 <?php
}

 function productForm($productID,$name,$description,$mark,$price,$size,$country,$fashion,$categoryName,
                     $userName,$style,$color,$material,$season,$gender,$action,$pageName,$btnName)
{
	$imgPath=getImage($productID);
	?>
		 <div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <div class="row">
		 <div class="col-md-7">
		 <form class="form-horizontal" action=<?php echo $action;?> method=POST>
		 <input type="hidden" name="ID" value=<?php echo $productID; ?>>
		 
		 <div class="form-group form-group-lg addField add">
		 <label class="control-label"></label>
		 <li class="fa fa-close"></li>
		 <div>
		 <input id='inp'type="text" class="form-control" autocomplete="off">
		 </div>
		 <span class="btn btn-primary btn-md"></span>
		 </div>
		 
		 
		 <div class="form-group form-group-lg hasBtn forName">
		 <label class="col-sm-4 control-label">Product type</label>
		 <div class="col-sm-9 col-md-8">
		  <select name="name" class="form-control" required="required" id="selectName"> 
			  <?php 
			     global $conn;
				 $stmt=$conn->prepare("select DISTINCT Name from products");
		         $stmt->execute();
				 $rows=$stmt->fetchAll();
			     foreach($rows as $row)
				 {
					 $Name=$row['Name'];
					 $selected='';
					 if($name==$Name)$selected="selected";
					 echo "<option  value='".$Name."' ".$selected.">".$Name."</option>";
				 }
			 ?>
		  </select>
		 </div>
		 <div class="col-lg-offset-4 col-sm-10 col-md-8 typeBtn">
		 <span class='btn btn-primary name'>
		    <i class="fa fa-plus fa-fw fa-xs"></i>Add new type
		</span>
		 <span class='btn btn-danger nameD'>
		   <i class="fa fa-close fa-fw fa-md"></i>Delete type
		 </span>
		 </div>
		 </div>

		 
		 <div class="form-group form-group-lg desc">
		 <label class="col-sm-4 control-label">Description</label>
		 <div class="col-sm-10 col-md-8">
		 <input type="description" <?php $val=($description==null)?"":$description;
		  echo "value='".$val."'";?> name="description" class="form-control live"
		  data-class=".liveDescrip"  required  pattern=".{10,}" 
		  title="Description has minimum 10 characters"
		     placeholder="Descripe the category"/>
		 </div>
		 </div>
		  
		  <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Price</label>
		 <div class="col-sm-10 col-md-8">
		 <input type="text" <?php $val=($price==null)?"":$price;echo "value='".$val."'"; ?>
		  name="price" class="form-control live" required="required"
		  title="price must be numeric" pattern="[0-9]{1,}"
		  placeholder="Enter the price of product" data-class=".livePrice"/>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Image path</label>
		 <div class="col-sm-10 col-md-8">
		 <input type="text" <?php $val=($imgPath==null)?"":$imgPath;echo "value='".$val."'"; ?>
		  name="image" class="form-control imgPath" required="required"
		  title="price must be string >10" pattern=".{10,}"
		  placeholder="Enter the path Of image" data-class=".liveImage"/>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Country</label>
		 <div class="col-sm-10 col-md-8">
		 <input type="text" <?php $val=($country==null)?"":$country;echo "value='".$val."'"; ?>
		   name="country" class="form-control live" required="required"
		   placeholder="Enter the country of product" data-class=".liveCountry"
		   title="country has minmum two characters" pattern=".{2,}"/>
		 </div>
		 </div>
		 
		  
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Fashion</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="fashion" class="form-control"> 
			 <option value="1" <?php if($fashion=="Modern") echo "selected";?>>Modern</option>
			 <option value="2" <?php if($fashion=="Old") echo "selected";?>>Old</option>
			 <option value="3" <?php if($fashion=="Very old") echo "selected";?>>Very old</option>
			 <option value="4" <?php if($fashion=="Like new") echo "selected";?>>Like new</option>
			 <option value="5" <?php if($fashion=="Classic") echo "selected";?>>Classic</option>
		  </select>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Mark</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="mark" class="form-control"> 
			 <option value="1" <?php if($mark=="High") echo "selected";?>>High</option>
			 <option value="3" <?php if($mark=="Medium") echo "selected";?>>Medium</option>
			 <option value="2" <?php if($mark=="Low") echo "selected";?>>Low</option>
			 <option value="4" <?php if($mark=="Acceptable") echo "selected";?>>Acceptable</option>
		  </select>
		 </div>
		 </div>
		   
		   
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Categorie</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="categories" class="form-control"> 
			 <?php 
			     global $conn;
			     $stmt=$conn->prepare("select * from categories");
		         $stmt->execute();
				 $rows=$stmt->fetchAll();
			     foreach($rows as $cat)
				 {
					 $catid=$cat['ID'];
					 $catname=$cat['Name'];
					 $selected='';
					 if($categoryName==$catname)$selected="selected";
					 echo "<option value='".$catid."' ".$selected.">".$catname."</option>";
				 }
			 ?>
		  </select>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg hasBtn forStyle">
		 <label class="col-sm-4 control-label">Style</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="style" class="form-control" required="required" id="selectStyle"> 
			  <?php 
			     global $conn;
				 $stmt=$conn->prepare("select DISTINCT Style from products");
		         $stmt->execute();
				 $rows=$stmt->fetchAll();
			     foreach($rows as $row)
				 {
					 $Style=$row['Style'];
					 $selected='';
					 if($style==$Style)$selected="selected";
					 echo "<option value='".$Style."' ".$selected.">".$Style."</option>";
				 }
			 ?>
		  </select>
		 </div>
		 <div class="col-lg-offset-4 col-sm-10 col-md-8 typeBtn">
		 <span class='btn btn-primary style'>
		    <i class="fa fa-plus fa-fw fa-xs"></i>Add new style
		</span>
		 <span class='btn btn-danger styleD'>
		   <i class="fa fa-close fa-fw fa-md"></i>Delete Style
		 </span>
		 </div> 
		 </div>
		 
		 <div class="form-group form-group-lg hasBtn forMaterial">
		 <label class="col-sm-4 control-label">Material</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="material" class="form-control" required="required" id="selectMaterial">
			 <?php 
			     global $conn;
			     $stmt=$conn->prepare("select DISTINCT Material from products");
		         $stmt->execute();
				 $rows=$stmt->fetchAll();
			     foreach($rows as $row)
				 {
					 $Material=$row['Material'];
					 $selected='';
					 if($material==$Material)$selected="selected";
					 echo "<option value='".$Material."' ".$selected.">".$Material."</option>";
				 }
			 ?>
		  </select>
		  </div>
		    <div class="col-lg-offset-4 col-sm-10 col-md-8 typeBtn">
		      <span class='btn btn-primary material'>
		       <i class="fa fa-plus fa-fw fa-xs"></i>Add new material
		      </span>
		      <span class='btn btn-danger materialD'>
		       <i class="fa fa-close fa-fw fa-md"></i>Delete material
		      </span>
		   </div> 
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Color</label>
		 <div class="col-sm-10 col-md-8">
		 <input type='color' name='color' class='form-control'>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Product size</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="size" class="form-control" required="required">
		     <option value="1" <?php if($size=="S")   echo "selected";?>>S</option> 
			 <option value="2" <?php if($size=="XS")  echo "selected";?>>XS</option>
			 <option value="3" <?php if($size=="XXS") echo "selected";?>>XXS</option>
			 <option value="4" <?php if($size=="L")   echo "selected";?>>L</option>
			 <option value="5" <?php if($size=="XL")  echo "selected";?>>XL</option>
			 <option value="6" <?php if($size=="XXL") echo "selected";?>>XXL</option>
			 <option value="7" <?php if($size=="M")   echo "selected";?>>M</option>
			 <option value="8" <?php if($size=="ML")  echo "selected";?>>ML</option>
			 <option value="9" <?php if($size=="MS")  echo "selected";?>>MS</option>
		  </select>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Season</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="season" class="form-control" required="required">
		     <option value="1" <?php if($season=="Summer") echo "selected";?>>Summer</option> 
			 <option value="2" <?php if($season=="Spring") echo "selected";?>>Spring</option>
			 <option value="3" <?php if($season=="Winter") echo "selected";?>>Winter</option>
			 <option value="4" <?php if($season=="Autumn") echo "selected";?>>Autumn</option>
			 <option value="5" <?php if($season=="Whole year") echo "selected";?>>Whole year</option>
		  </select>
		 </div>
		 </div>
		 
		 <div class="form-group form-group-lg">
		 <label class="col-sm-4 control-label">Gender</label>
		 <div class="col-sm-10 col-md-8">
		  <select name="gender" class="form-control">
			 <option value="1" <?php if($gender=="Male") echo "selected";?>>Male</option>
			 <option value="2" <?php if($gender=="Femal") echo "selected";?>>Femal</option>
			 <option value="3" <?php if($gender=="Unsex") echo "selected";?>>Unsex</option>
		  </select>
		 </div>
		 </div>
		  <div class="form-group form-group-lg">
		 <div class="col-sm-offset-4 col-sm-10 col-lg-4">
		 <input type="submit" <?php $val=($btnName==null)?'':$btnName;echo "value='".$val."'"; ?> class="btn btn-primary btn-lg"/>
		 </div>
		 </div>
		 </form>
		 </div><!--end of col-md-7 div-->
		 <?php
}

function showProductBox($img,$name,$description,$price,$country,$material)
{
	$insertCompleted=false;
	$errors=array();
	?>
	<div class="col-md-5 advtmSide">  
	         
	  
			     <?php
				 $myImg=($img==null)?' ':$img;
				 $name=($name==null)?'':$name;
				 $description=($name==null)?'':$description;
				 $price=($name==null)?'':$price;
				 $country=($name==null)?'':$country;
				 $material=($name==null)?'':$material;
				      echo"<div class='thumbnail productBox livePreview'>";
		                echo "<span class='price text-center'>";
						   echo "$<span class='livePrice'>".$price."</span>";						   
						echo "</span>";
						echo "<span class='country liveCountry text-center'>".$country."</span>";
						echo "<span class='material liveMaterial text-center'>".$material."</span>";
		                echo "<img class='myImage img-responsive' src=$myImg alt=''>";
			            echo "<div class='caption'>";
			               echo"<h3>".$name."</h3>";
				           echo"<p class='liveDescrip'>".$description."</p>";
			            echo"</div>";
		              echo"</div>";
				 ?>			
			 </div>
		  </div>
	   </div>
   <?php
}



function updateUser($pageName)
{
	global $conn;
	?><div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <div class="row update">
		 <div class="col-lg-2">
		 <?php
		 $id=$_POST['userID'];
		 $name=$_POST['username'];
		 $mail=$_POST['email'];
		 $full=$_POST['fullname'];
		 $stmt=$conn->prepare("select pass from users where userID=?");
		 $stmt->execute(array($id));
		 $pass=($_POST['password']==null||$_POST['password']=="")?($stmt->fetch()['pass']):sha1($_POST['password']);
		 echo "ID <br>";
		 echo "User Name <br>";
		 echo "Full Name <br>";
		 echo "Email <br>";
		 ?>
		 </div>
		 <div class="col-lg-4">
		 <?php
		 echo $id."<br>";
		 echo $name."<br>";
		 echo $full."<br>";
		 echo $mail."<br>";
		 ?>
		 </div>
		 </div>
		 </div>
		 <?php
		 $stmt=$conn->prepare("update users set userName=?,Email=?,FullName=?,pass=? where userID=?");
		 $stmt->execute(array($name,$mail,$full,$pass,$id));
}



function updateProduct($pageName,$uid)
{
	global $conn;
		 $id=$_POST['ID'];
		 $name=$_POST['name'];
		 $description=$_POST['description'];
		 $price=$_POST['price'];
		 $country=$_POST['country'];
		 $fashion=$_POST['fashion'];
		 $catID=$_POST['categories'];
		 $userID=$uid;
		 $style=$_POST['style'];
		 $season=$_POST['season'];
		 $gender=$_POST['gender'];
		 $material=$_POST['material'];
		 $color=$_POST['color'];
		 $size=$_POST['size'];
		 $mark=$_POST['mark'];
		 $img=$_POST['image'];
		 //update database
		 /*
		 validationhere
		 */
		 $stmt=$conn->prepare("update products set Name=?,Description=?,Mark=?,Size=?,Price=?,countryMade=?,categoryID=?,memberID=?,addDate=now(),
		 Color=?,Fashion=?,Style=?,Material=?,Gender=?,Season=?,Image=? where ID=?");
		 $stmt->execute(array($name,$description,$mark,$size,$price,$country,
		 $catID,$userID,$color,$fashion,$style,$material,$gender,$season,$img,$id));
		 $mess="<div class='alert alert-success'>product is updated</div>";
		 redirectToHome($mess,"back");
}


function updateComment($pageName)
{
	global $conn;
		 $id=$_POST['commentID'];
		 $comment=$_POST['comment'];
		 //update database
		 /*
		 validationhere
		 */
		 $stmt=$conn->prepare("update comments set comment=?,commentDate=now() where ID=?");
		 $stmt->execute(array($comment,$id));
		 $mess="<div class='alert alert-success'>Comment is updated</div>";
		 redirectToHome($mess,"back");
}

function updateOffer($pageName)
{
	global $conn;
		 $offerID=$_POST['offerID'];
		 $prodID=$_POST['prodID'];
		 $offerDescription=$_POST['offerDescription'];
		 $discount=$_POST['discount'];
		 $discountInterval=$_POST['discountInterval'];
		 //update database
		 /*
		 validationhere
		 */
		 $stmt=$conn->prepare("update offers set offerHint=?,offerValue=?,offerInterval=? where ID=?");
		 $stmt->execute(array($offerDescription,$discount,$discountInterval,$offerID));
		 $mess="<div class='alert alert-success'>Offer is updated</div>";
		 redirectToHome($mess,"back");
}


function updateCategory($pageName)
{
	global $conn;
	?><div class="container">
		 <h1 class="text-center"><?php echo $pageName; ?></h1>
		 <div class="row update-category">
		 <div class="col-lg-3">
		 <?php
		 $id=$_POST['catID'];
		 $name=$_POST['name'];
		 $nameAr=$_POST['nameAr'];
		 $description=$_POST['description'];
		 $visibility=$_POST['visibility'];
		 $allowComment=$_POST['comment'];
		 $allowAdvtm=$_POST['Advtm'];
		 $ordering=$_POST['ordering'];
		 $stmt=$conn->prepare("select pass from users where userID=?");
		 $stmt->execute(array($id));
		 echo "<span> ID </span>";
		 echo "<span>Category Name </span>";
		 echo "<span>Description </span>";
		 ?>
		 </div>
		 <div class="col-lg-5">
		 <?php
		 echo "<span>".$id."</span>";
		 echo "<span>".$name."</span>";
		 echo "<span>".$description."</span>";
		 ?>
		 </div>
		 </div>
		 </div>
		 <?php
		 //update database
		 /*
		 validation here
		 */
		 $stmt=$conn->prepare("update categories set Name=?,NameAr=?,Description=?,Ordering=?,Visibility=?,AllowAdvtm=?,AllowComment=? where ID=?");
		 $stmt->execute(array($name,$nameAr,$description,$ordering,$visibility,$allowAdvtm,$allowComment,$id));
}

 

function InsertUser ()
{         
         global $conn;
	     $name=$_POST['username'];
		 $mail=$_POST['email'];
		 $full=$_POST['fullname'];
		 $pass=$_POST['password'];
		  //check if user is not exist 
		 $check=checkItem("userName","users",$name);
		 if($check==0)
		 {
	$stmt=$conn->prepare("insert into users (userName,pass,Email,FullName,regStatus,Date) values(?,?,?,?,1,now())");
         $stmt->execute(array($name,$pass,$mail,$full));
       
		     $mess="<div class='alert alert-success'>one member is added</div>";
		     redirectToHome($mess,"back");
		 }
		  //check if user is  exist
		 else
		 {
			 $mess="<div class='alert alert-danger'>This user is already exist</div>";
		     redirectToHome($mess,"back"); 
		 }
}


function InsertCategory ()
{         
         global $conn;
	     $name=$_POST['name'];
		 $nameAr=$_POST['nameAr'];
		 $description=$_POST['description'];
		 $ordering=$_POST['ordering'];
		 $visibility=$_POST['visibility'];
		 $allowComment=$_POST['comment'];
		 $allowAdvtm=$_POST['Advtm'];
		  //check if category is not exist 
		 $check=checkItem("name","categories",$name);
		 if($check==0)
		 {
	         $stmt=$conn->prepare("insert into categories (Name,NameAr,Description,Ordering,Visibility,AllowComment,AllowAdvtm) values(?,?,?,?,?,?,?)");
             $stmt->execute(array($name,$nameAr,$description,$ordering,$visibility,$allowComment,$allowAdvtm));
       
		     $mess="<div class='row alert alert-success'>one category is added</div>";
		     redirectToHome($mess,"back");
		 }
		  //check if category is  exist
		 else
		 {
			 $mess="<div class='alert alert-danger'>This category is already exist</div>";
		     redirectToHome($mess,"back"); 
		 }
}

function InsertOffer ()
{         
         global $conn;
	     $prodID=$_POST['prodID'];
		 $offerDescription=$_POST['offerDescription'];
		 $discount=$_POST['discount'];
		 $discountInterval=$_POST['discountInterval'];
		  //check if category is not exist 
		 $check=checkItem("productID","offers",$prodID);
		 if($check==0)
		 {
	         $stmt=$conn->prepare("insert into offers (productID,offerHint,offerValue,offerInterval,remainInterval,addDate) values(?,?,?,?,?,now())");
             $stmt->execute(array($prodID,$offerDescription,$discount,$discountInterval,$discountInterval));
       
		     $mess="<div class='row alert alert-success'>one offer is added</div>";
		     redirectToHome($mess,"back");
		 }
		  //check if category is  exist
		 else
		 {
			 $mess="<div class='alert alert-danger'>This offfer is already exist</div>";
		     redirectToHome($mess,"back"); 
		 }
}

function InsertProduct ($uid)
{         
         global $conn;
	     $name=$_POST['name'];
		 $description=$_POST['description'];
		 $price=$_POST['price'];
		 $country=$_POST['country'];
		 $rating=4;
		 $catid=$_POST['categories'];
		 $memberid=$uid;
		 $fashion=$_POST['fashion'];
		 $style=$_POST['style'];
		 $material=$_POST['material'];
		 $season=$_POST['season'];
		 $gender=$_POST['gender'];
		 $color=$_POST['color'];
		 $size=$_POST['size'];
		 $mark=$_POST['mark'];
		$img=$_POST['image'];
		  //check if no error  
		  if(true)
		  {
	         $stmt=$conn->prepare("insert into products (Name,Description,Mark,Size,Price,countryMade,Fashion,Rating,addDate,
			 categoryID,memberID,Color,Season,Material,Style,Gender,Image) 
			 values(?,?,?,?,?,?,?,?,now(),?,?,?,?,?,?,?,?)");
             $stmt->execute(array($name,$description,$mark,$size,$price,$country,$fashion,$rating,$catid,$memberid
			 ,$color,$season,$material,$style,$gender,$img));
       
		     $mess="<div class='row alert alert-success'>one product is added</div>";
		     redirectToHome($mess,"back");
		  }
		  //check if category is  exist
		 else
		 {
			 $mess="<div class='alert alert-danger'>This product is already exist</div>";
		     redirectToHome($mess,"back"); 
		 }
}

/*
**delete function v1.0 to delete one member
*/
function deletUser()
{
	global $conn;
	$userID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if user is exist
	$check=checkItem("userID","users",$userID);
	if($check==1)
	{
			//deletethis member from database
	        $stmt=$conn->prepare("delete from users where userID=? limit 1");
			$stmt->execute(array($userID));
			$mess="<div class='alert alert-success'>one member deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this username not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}


/*
**delete function v1.0 to delete one comment
*/
function deleteComment()
{
	global $conn;
	$commentID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if user is exist
	$check=checkItem("ID","comments",$commentID);
	if($check==1)
	{
			//deletethis member from database
	        $stmt=$conn->prepare("delete from comments where ID=? limit 1");
			$stmt->execute(array($commentID));
			$mess="<div class='alert alert-success'>one comment deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this comment not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}

/*
**delete function v1.0 to delete one product
*/
function deleteProduct()
{
	global $conn;
	$prodID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if user is exist
	$check=checkItem("ID","products",$prodID);
	if($check==1)
	{
			//deletethis member from database
	        $stmt=$conn->prepare("delete from products where ID=? limit 1");
			$stmt->execute(array($prodID));
			$mess="<div class='alert alert-success'>one product deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this product not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}

/*
**delete function v1.0 to delete one member
*/
function deleteCategory()
{
	global $conn;
	$catID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if category is exist
	$check=checkItem("ID","categories",$catID);
	if($check==1)
	{
			//deletethis category from database
	        $stmt=$conn->prepare("delete from categories where ID=? limit 1");
			$stmt->execute(array($catID));
			$mess="<div class='alert alert-success'>one category deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this category not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}


/*
**delete function v1.0 to delete one offer
*/
function deleteOffer()
{
	global $conn;
	$offerID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if category is exist
	$check=checkItem("ID","offers",$offerID);
	if($check==1)
	{
			//deletethis offer from database
	        $stmt=$conn->prepare("delete from offers where ID=? limit 1");
			$stmt->execute(array($offerID));
			$mess="<div class='alert alert-success'>one offer deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this offer not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}



/*
**activatefunction v1.0to activate one member
*/
function activate()
{
	global $conn;
	$userID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if user is exist
	$check=checkItem("userID","users",$userID);
	if($check==1)
	{
			//activate this member from database
	        $stmt=$conn->prepare("update  users set regStatus=1 where userID=?");
			$stmt->execute(array($userID));
			$mess="<div class='alert alert-success'>one member activated</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this username not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}

/*
**delete function v1.0 to delete one type
*/
function deleteType()
{
	global $conn;
	$typeName=(isset($_GET['name']))?$_GET['name']:"";
	//check if user is exist
	$check=checkItem("Name","products",$typeName);
	if($check==1)
	{
			//delete this type from database
	        $stmt=$conn->prepare("delete from products where Name=?");
			$stmt->execute(array($typeName));
			$mess="<div class='alert alert-success'>one Type deleted</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this Type not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}


/*
**approveProduct function v1.0to accept one product
*/
function approveProduct()
{
	global $conn;
	$prodID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if product is exist
	$check=checkItem("ID","products",$prodID);
	if($check==1)
	{
			//activate this member from database
	        $stmt=$conn->prepare("update  products set Approve=1 where ID=?");
			$stmt->execute(array($prodID));
			$mess="<div class='alert alert-success'>The product is approved</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this product not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}



/*
**approvecomment function v1.0to accept one comment
*/
function approveComment()
{
	global $conn;
	$commentID=(isset($_GET['ID'])&&is_numeric($_GET['ID']))?intval($_GET['ID']):0;
	//check if product is exist
	$check=checkItem("ID","comments",$commentID);
	if($check==1)
	{
			//activate this member from database
	        $stmt=$conn->prepare("update  comments set status=1 where ID=?");
			$stmt->execute(array($commentID));
			$mess="<div class='alert alert-success'>The comment is approved</div>";
		     redirectToHome($mess,"back");
    }
         else 
        {
			 $mess="<div class='alert alert-danger'>this comment not founded in database</div>";
		     redirectToHome($mess,"back");
		}
}


function showType()
{
	global $conn;
	$typeName=(isset($_GET['name']))?$_GET['name']:"";
	//check if type is exist
	$check=checkItem("Name","products",$typeName);
	if($check>0)//the type is founded in database
	{
			//get products of this type from database
	        $stmt=$conn->prepare("SELECT  p.ID,P.Price,p.description,p.Approve,
			                      users.userName,categories.Name  catName 
                                  FROM products p JOIN users ON p.memberID=users.userID
                                  JOIN categories ON p.categoryID=categories.ID
                                  WHERE p.Name=?");
			                                   
			$stmt->execute(array($typeName));
			$rows=$stmt->fetchAll();
			?>
			<h1 class='text-center'>
				  Clothes products that related to <span style="color:red"><?php echo $typeName;?></span>
			</h1>
			<div class="container">
		     <div class="table-responsive">
		     <table class="main-table table table-bordered text-center">
			  <tr>
			  <td>ID</td>
			  <td style="width:5cm">Description</td>
			  <td>Price</td>
			  <td>Category Name</td>
			  <td>User name</td>
			  <td>More Details</td>
			  <td>Control</td>
			 </tr>
			 <?php 
			 foreach($rows as $row)
			 {
				 echo "<tr>";
				     echo "<td>".$row['ID']."</td>";
					 echo "<td>".$row['description']."</td>";
					 echo "<td>".$row['Price']."</td>"; 
					 echo "<td>".$row['catName']."</td>";
					 echo "<td>".$row['userName']."</td>";
					 echo"<td><a href='types.php?do=detail&ID=".$row['ID']."'><span class='btn btn-primary'><i class='fa fa-book'><i> details</span></td>";
					 echo "<td>";
					    echo "<a href='products.php?do=edit&ID=".$row['ID']."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a> ";
						echo "<a href='products.php?do=delete&ID=".$row['ID']."' class='btn btn-danger confirmingProduct'><i class='fa fa-close'></i> Delete</a> ";
						if($row['Approve']==0)
						{
						echo "<a href='products.php?do=approve&ID=".$row['ID']."' class='btn btn-info'><i class='fa fa-check'></i> Approve</a> ";	
						}
					 echo "</td>";
				 echo "</tr>";
			 }
			 
			 ?>
			 
			</table>
		   </div>
		   <a href="products.php?do=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a> 
		  </div>
		  <?php
    }
    else //the type is not founded in database
    {
			 $mess="<div class='alert alert-danger'>There are no any products of this clothes type</div>";
		   
	         ?>
	            <h1 class='text-center'>
				  Clothes products that related to <span style="color:red"><?php echo $typeName;?></span>
				</h1>
	         <?php
			 redirectToHome($mess,"back");
    }
}

function showProdDetail()
{
	global $conn;
	$prodID=(isset($_GET['ID']))?$_GET['ID']:0;
	//check if type is exist
	$check=checkItem("ID","products",$prodID);
	if($check>0)//the type is founded in database
	{   
	    //get products of this type from database
	       $stmt=$conn->prepare("select userName,cat.Name catName,prod.ID prodID,prod.Name prodName,prod.Description,
		 prod.Price,prod.Fashion,prod.CountryMade,prod.Style prodStyle,prod.Material prodMaterial,
		 prod.Color prodColor,prod.Gender prodGender,prod.Season prodSeason ,prod.Size prodSize,
		 prod.Mark as prodMark ,prod.addDate as date
		 from 
		 users join categories cat join products prod
		 on 
		 prod.categoryID=cat.ID and prod.memberID=userID where prod.ID=?");
		 $stmt->execute(array($prodID));
         $row=$stmt->fetch();
		 $id=$row['prodID'];
		 $type=$row['prodName'];
		 $description=$row['Description'];
		 $price=$row['Price'];
		 $country=$row['CountryMade'];
		 $fashion=$row['Fashion'];
		 $catName=$row['catName'];
		 $userName=$row['userName'];
		 $style=$row['prodStyle'];
		 $material=$row['prodMaterial'];
		 $season=$row['prodSeason'];
		 $gender=$row['prodGender'];
		 $color=$row['prodColor'];
		 $size=$row['prodSize'];
		 $mark=$row['prodMark'];
		 $date=$row['date'];
		 ?>
		 <h1 class='text-center'>More details about product</h1>
		 <div class="container">
		  <div class="row">
		   <div class="table-responsive col-lg-8">
		    <table class="main-table table table-bordered showTable">
			 <tr>
			  <td>ID</td>
			  <td><?php echo $id;?></td>
			 </tr>
			 <tr>
			  <td>Type</td>
			  <td><?php echo $type;?></td>
			 </tr>
			 <tr>
			  <td>Description</td>
			  <td><?php echo $description;?></td>
			 </tr>
			 <tr>
			  <td>Price</td>
			  <td><?php echo $price;?></td>
			 </tr> 
			 <tr>
			  <td>Adding date</td>
			  <td><?php echo $date;?></td>
			 </tr>
			 <tr>
			  <td>Category Name</td>
			  <td><?php echo $catName;?></td>
			 </tr>
			 <tr>
			  <td>User name</td>
			  <td><?php echo $userName;?></td>
			 </tr>
			 <tr>
			  <td>Country made</td>
			  <td><?php echo $country;?></td>
			 </tr>
			 <tr>
			  <td>Style</td>
			  <td><?php echo $style;?></td>
			 </tr>
			 <tr>
			  <td>Fashion</td>
			  <td><?php echo $fashion;?></td>
			 </tr>
			 <tr>
			  <td>Material</td>
			  <td><?php echo $material;?></td>
			 </tr>
			 <tr>
			  <td>Mark</td>
			  <td><?php echo $mark;?></td>
			 </tr>
			 <tr>
			  <td>Season</td>
			  <td><?php echo $season;?></td>
			 </tr>
			 <tr>
			  <td>Size</td>
			  <td><?php echo $size;?></td>
			 </tr>
			</table>
		   </div>
		   </div>
		  </div>
		 <?php
				  
				
	}
	
	else //the product is not founded in database
    {
			 $mess="<div class='alert alert-danger'>
			           There are no any products of this clothes type
			        </div>";
			 redirectToHome($mess,"back");
    }
}

/*this function show eeror message for certain seconds andthen redirected to thehome page
** message[success|error|warning]
*/
function redirectToHome($message,$url=null,$seconds=5)
{
	$alerMessage='';
if($url==null)
{
	$url="index.php";
}
else //redirect to the source page
{
	if(isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']!="")//if there no source
	{
	$url=$_SERVER['HTTP_REFERER'];//redirect to the source page
	$alerMessage="You will be redirected to the previous page after ".$seconds." seconds";
	}
    else
	{
	$url="index.php";	
	$alerMessage="you will be directed to the home page after ".$seconds." seconds";
	}
}
echo "<div class='container error'>";
  echo $message;
  echo "<div class='row alert alert-info'>".$alerMessage."</div>";
echo "</div>";
header("refresh:$seconds;url=$url");	
exit();
}
/*
**check item function v1.0
** this function check for item in database
*/
function checkItem($item,$table,$value)
{
	global $conn;
	$stmt=$conn->prepare("select $item from $table where $item=?");
    $stmt->execute(array($value));
	$count=$stmt->rowCount();
	return $count;
}
/*
**check number of items function v1.0
*/
function numOfItems($item,$table)
{
	global $conn;
	$stmt=$conn->prepare("select count($item) from $table");
    $stmt->execute();
	return $stmt->fetchColumn();
}
/*
**get latest records function v1.0
**get latest items[users |items|other]
*/
function getLatestItems($item,$table,$order,$limit=5)
{
	global $conn;
	$stmt=$conn->prepare("select $item from $table order by $order desc limit $limit");
    $stmt->execute();
	return $stmt->fetchAll();
}

?>