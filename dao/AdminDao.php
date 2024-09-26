<?php 

class AdminDao{
	function __construct($db){
		$this->pdo=$db;
	}

	public function bannerList ($type) {
		$query = "	SELECT
					B.id AS Id,
					B.type AS Type,
					B.image AS Image,
					B.link AS Link,
					B.date AS Date,
					B.status AS Status
					FROM banner B
					WHERE B.status=1
					AND B.type='".$type."'
					ORDER BY B.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function showingBrands ($id) {
		$query = "	SELECT
					*
					FROM showing_brands B
					WHERE id='$id'
					ORDER BY B.id DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function landerLink ( ) {
		$query = "	SELECT
					B.id AS Id,
					B.store_id AS Store,
					B.coupon_id AS Coupon,
					B.url AS Link
					FROM lander_url B
					WHERE B.id='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
		public function withdrawRequest ($user_id) {
		$query = "	SELECT
					*
					FROM withdraw_request B
					WHERE B.user_id='$user_id'
					
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
		public function transactionReport ($user_id) {
		$query = "	SELECT
					*
					FROM tbl_order B
					WHERE B.user_id='$user_id'
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function successTransactionReport ($user_id) {
		$query = "	SELECT
					*
					FROM tbl_order B
					WHERE B.user_id='$user_id'
					AND  B.status='1'
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
		public function sumOfAmount ($user_id) {
		 $query = "	SELECT
					Sum(amount) as Amount
					FROM tbl_order B
					WHERE B.user_id='$user_id'
					AND B.status=1
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function sumOfAmount2 ($user_id) {
		 $query = "	SELECT
					Sum(amount) as Amount
					FROM tbl_order B
					WHERE B.user_id='$user_id'
					AND B.status=1
					AND B.uid!='Sign Up Cashback'
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	public function wallet ($user_id) {
		$query = "	SELECT
					*
					FROM tbl_order B
					WHERE B.user_id='$user_id'
					AND B.status=1
					ORDER BY B.id ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	public function testimonialList () {
		$query = "	SELECT
					B.id AS Id,
					B.name AS Name,
					B.content AS Content,
					B.date AS Date,
					B.status AS Status
					FROM testimonial B
					
					ORDER BY B.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function categoryList () {
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.url AS Url,
					C.category AS Category,
					C.banner AS Banner,
					C.date AS Date,
					C.status AS Status
					FROM category C
					ORDER BY C.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function categoryListWithLimit ($start, $end) {
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.url AS Url,
					C.category AS Category,
					C.banner AS Banner,
					C.date AS Date,
					C.status AS Status
					FROM category C
					ORDER BY C.Category ASC LIMIT $start, $end";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function categoryListByType ( $type, $status ) {
		$query = "	SELECT
					C.type AS Type,
					C.id AS Id,
					C.category AS Category,
					C.date AS Date,
					C.status AS Status
					FROM category C
					WHERE C.type='$type'
					AND C.status='$status'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function categoryById ($id) {
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.url AS Url,
					C.title AS Title,
					C.meta_keyword AS MetaKeyword,
					C.meta_description AS MetaDescription,
					C.banner AS Banner,
					C.category_image AS CategoryImage,
					C.date AS Date,
					C.status AS Status
					FROM category C
					WHERE C.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function bannerById ($id) {
		$query = "	SELECT
					B.id AS Id,
					B.type AS Type,
					B.image AS Image,
					B.link AS Link,
					B.date AS Date,
					B.status AS Status
					FROM banner B
					WHERE  B.id='$id'
					ORDER BY B.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function categoryByUrl ($url) {
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.title AS Title,
					C.meta_keyword AS MetaKeyword,
					C.meta_description AS MetaDescription,
					C.banner AS Banner,
					C.category_image AS CategoryImage,
					C.date AS Date,
					C.status AS Status
					FROM category C
					WHERE C.url='$url'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	public function blogList() {
		$query = "	SELECT					
					B.id AS Id,
					B.category AS Category,
					B.taging AS Taging,
					B.heading AS Heading,
					B.url AS Url,
					B.name AS Name,
					B.short_description AS ShortDescription,
					B.image AS Image,
					B.title AS Title,
					B.meta_keyword AS MetaKeyword,
					B.meta_description AS MetaDescription,
					B.description AS Description,
					B.visit AS Visit,
					B.date AS Date,
					B.status AS Status
					FROM blog B WHERE B.status='1'
					Order By B.id desc";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function blogByUrl($url) {
		$query = "	SELECT
					B.id AS Id,
					B.category AS Category,
					B.taging AS Taging,
					B.heading AS Heading,
					B.url AS Url,
					B.name AS Name,
					B.short_description AS ShortDescription,
					B.image AS Image,
					B.title AS Title,
					B.meta_keyword AS MetaKeyword,
					B.meta_description AS MetaDescription,
					B.description AS Description,
					B.blog_date AS BlogDate,
					B.date AS Date,
					B.status AS Status
					FROM blog B
					WHERE B.url='$url'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	
	//------------------------------------About Company-------------------------------------------

	public function aboutUsList(){
		$query="SELECT 
				A.id AS Id,
				A.heading AS Heading,
				A.sub_heading AS SubHeading,
				A.history AS History,
				A.mission AS Mission,
				A.vision AS Vision,
				A.home_img AS HomeImg,
				A.history_img AS HistoryImg,
				A.mission_img AS MissionImg,
				A.vision_img AS VisionImg,
				A.description AS Description,
				A.title AS Title,
				A.meta_tag AS MetaTag,
				A.meta_description AS MetaDescription,
				A.url AS Url,
				A.date AS Date,
				A.status AS Status
				FROM about A";
		$stmt=$this->pdo->prepare($query);
		$stmt->execute();
		$result=$stmt->fetchAll(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function getAboutByID($id){
		$query = "  SELECT 
					A.id AS Id,
					A.heading AS Heading,
					A.sub_heading AS SubHeading,
					A.history AS History,
					A.mission AS Mission,
					A.vision AS Vision,
					A.home_img AS HomeImg,
					A.history_img AS HistoryImg,
					A.mission_img AS MissionImg,
					A.vision_img AS VisionImg,
					A.description AS Description,
					A.title AS Title,
					A.meta_tag AS MetaTag,
					A.meta_description AS MetaDescription,
					A.url AS Url,
					A.date AS Date,
					A.status AS Status
					FROM about A
					WHERE A.id='$id'";
		$stmt=$this->pdo->prepare($query);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_OBJ);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	

	
	public function siteControlById ($id){ 
		$query = "	SELECT
					SC.id AS Id,
					SC.staff_id AS StaffId,
					SC.type AS Type,
					SC.service_type AS ServiceType,
					SC.pic AS Pic,
					SC.mobile_pic AS MobilePic,
					SC.heading_1 AS Heading_1,
					SC.heading_2 AS Heading_2,
					SC.heading_3 AS Heading_3,
					SC.heading_4 AS Heading_4,
					SC.heading_5 AS Heading_5,
					SC.heading_6 AS Heading_6,
					SC.heading_7 AS Heading_7,
					SC.heading_8 AS Heading_8,
					SC.heading_9 AS Heading_9,
					SC.heading_10 AS Heading_10,
					SC.heading_11 AS Heading_11,
					SC.title AS Title,
					SC.meta_keyword AS MetaKeyword,
					SC.meta_description AS MetaDescription,
					SC.url AS Url,
					SC.link AS Link,										
					SC.date AS Date,
					SC.status AS Status
					FROM site_control SC
					WHERE SC.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	
	public function couponList(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.date AS Date,
					C.status AS Status
					FROM coupon C WHERE 
					C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'
					ORDER BY C.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function couponById($id){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.cashback_amt AS Cashback,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.image AS Image,
					C.content1 As AboutProduct,
					C.content2 As AboutOffer,
					C.content3 As HowWillIgetThisOffer,
					C.comp_link AS CompLink,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function couponByStore($store_id){
		 $query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.slug AS Slug,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer_type AS OfferType,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.link AS Link,
					C.image AS Image,
					C.verified AS Verified,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.store='$store_id' 
					
					";
					/*AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'*/
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function couponByCategory($category){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.link AS Link,
					C.verified AS Verified,
					C.image AS Image,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.category='$category'
					AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function t20CouponByCategory($category){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.date AS Date,
					C.image AS Image,
					C.status AS Status
					FROM coupon C
					WHERE C.category='$category'
					AND C.top20=1
					AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function offerCouponByCategory($category){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.date AS Date,
					C.image AS Image,
					C.status AS Status
					FROM coupon C
					WHERE C.category='$category'
					AND C.offer=1
					AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}



	public function  dealCoupon(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.image AS Image,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.handpicked='1'
					AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	
	public function  productCoupon(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.slug AS Slug,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.mrp AS MRP,
					C.cashback_amt AS Cashback,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.image AS Image,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.type='Product'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	



	public function  AllCoupon(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.image AS Image,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.type='Coupon'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}


	public function  productCouponByCategory($category){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.slug AS Slug,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.mrp AS MRP,
					C.cashback_amt AS Cashback,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer_type AS OfferType,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.image AS Image,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.type='Product'
					AND C.category='$category'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function  offerCoupon(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.link AS Link,
					C.verified AS Verified,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.offer='1'
					AND C.coupon_start_date<='".date('Y-m-d')."' 
					AND C.coupon_end_date>='".date('Y-m-d')."'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function  top20Coupon(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.top20='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	

	public function storeList(){
		$query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.slug AS Slug,
					R.token AS Token,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.date AS Date
					FROM reguser R";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function storeListWithLimit($start,$end){
		$query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.slug AS Slug,
					R.token AS Token,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.date AS Date
					FROM reguser R
					Order BY R.Name ASC LIMIT $start,$end";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	
	public function storeListByCategory($category){
		$query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.email AS Email,
					R.slug AS Slug,
					R.token AS Token,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.date AS Date
					FROM reguser R WHERE 
					R.category='$category'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	


	public function ReguserById($id){
		  $query = "SELECT
					R.id AS Id,
					R.category AS Category,
					R.Slug AS Url,
					R.token AS Token,
					R.token AS storeSubId,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.link AS StoreLink,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.esti_cashback_date AS EstimateCashbackDate,
					R.avg_tracking_speed AS TrackingSpeed,
					R.avg_claim_time AS ClaimTime,
					R.cashback_rate AS CashbackRate,
					R.description AS Description,
					R.date AS Date
					FROM reguser R
					WHERE R.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
		public function ReguserByToken($id){
		  $query = "SELECT
					R.id AS Id,
					R.category AS Category,
					R.Slug AS Url,
					R.token AS storeSubId,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.link AS StoreLink,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.esti_cashback_date AS EstimateCashbackDate,
					R.avg_tracking_speed AS TrackingSpeed,
					R.avg_claim_time AS ClaimTime,
					R.cashback_rate AS CashbackRate,
					R.date AS Date
					FROM reguser R
					WHERE R.token='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
  
  
  
  public function storeBySlugToken($slug, $token){
		  $query = "SELECT
					R.id AS Id,
					R.category AS Category,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.link AS StoreLink,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.esti_cashback_date AS EstimateCashbackDate,
					R.avg_tracking_speed AS TrackingSpeed,
					R.avg_claim_time AS ClaimTime,
					R.date AS Date
					FROM reguser R
					WHERE R.slug='$slug'
					AND R.token='$token'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function storeBySearch($search_term){
		  $query = "SELECT
					R.id AS Id,
					R.category AS Category,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
					R.image AS Image,
					R.link AS StoreLink,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.esti_cashback_date AS EstimateCashbackDate,
					R.avg_tracking_speed AS TrackingSpeed,
					R.avg_claim_time AS ClaimTime,
					R.date AS Date
					FROM reguser R
					WHERE R.slug LIKE '%$search_term%'
					OR R.name LIKE '%$search_term%'
					";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function referredInvitation($user_id){
	   echo $query = "SELECT
					*
					FROM refer_invitation R
					WHERE R.user_id='$user_id'
					";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
    public function	saveWithdrawRequest($user_id, $withdraw_id, $amount, $transaction_mode, $upi_id, $account_number, $ifsc_code, $account_holder_name, $reference, $date) {
	$query = "	INSERT INTO withdraw_request SET
					user_id='$user_id',
					withdraw_id='$withdraw_id',
					amount='$amount',
					transaction_mode='$transaction_mode',
					upi_id='$upi_id',
					account_number='$account_number',
					ifsc_code='$ifsc_code',
					account_holder_name='$account_holder_name',
					reference='$reference',
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
			
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function saveUser($name, $email, $mobile, $referral_code, $my_referral_code, $password, $token, $code, $otp, $date) {
	   
	 $query = "	INSERT INTO register SET
					name='$name',
					email='$email',
					mobile='$mobile',
					referral_code='$referral_code',
					my_referral_code='$my_referral_code',
					password='$password',
					token='$token',
					code='$code',
					otp='$otp',
					status=0,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function verifyEmailByOtp( $email, $otp ){
		$query = "	SELECT
					R.id AS Id,
					R.name AS Name
					FROM register R 
					WHERE R.email='$email' 
					AND R.otp='$otp'
					AND R.status='0'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function userById( $id ){
		$query = "	SELECT
					*
					FROM register R 
					WHERE R.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateVerifyStatus( $user_id, $email, $otp ) {
		$query = "	UPDATE register SET
					status='1'
					WHERE email='$email'
					AND otp='$otp'
					AND id='$user_id'";
		$stmt = $this->pdo->prepare ( $query );		
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	
	public function saveInvitation($user_id, $sub_id, $refer_code, $email, $link, $date) {
	$query = "	INSERT INTO refer_invitation SET
					user_id='$user_id',
					sub_id='$sub_id',
					refer_code='$refer_code',
					invite_email='$email',
					invite_link='$link',
					date='$date',
					status='0',
					amount='10'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	


	public function checkEmail($email) {
	  	$query = " SELECT
					R.id AS Id
					FROM register R
					WHERE  R.email='$email'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function checkEmailLogin($email) {
	  	$query = "  SELECT
					R.id AS Id,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.image AS Image,
					R.referral_code AS ReferralCode,
					R.code AS Code,
					R.token AS Token,
					R.my_referral_code AS MyReferralCode,
					R.code AS Code,
					R.dash_popup AS DashPopup,
					R.date AS Date
					FROM register R
					WHERE  R.email='$email'
					ANd R.status='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	

	public function checkCode($reset_code) {
		$query = " SELECT
				  R.id AS Id
				  FROM register R
				  WHERE  R.reset_code='$reset_code'";
	  $stmt = $this->pdo->prepare ( $query );
	  $stmt->execute ();
	  $result = $stmt->fetch ( PDO::FETCH_OBJ );
	  if (! empty ( $result )) {
		  return $result;
	  } else {
		  return false;
	  }
  }
  
  
  public function checkResetCode($reset_code,$email){
		$query = " SELECT
				  R.id AS Id
				  FROM register R
				  WHERE  R.reset_code='$reset_code'
				  AND R.email='$email'";
	  $stmt = $this->pdo->prepare ( $query );
	  $stmt->execute ();
	  $result = $stmt->fetch ( PDO::FETCH_OBJ );
	  if (! empty ( $result )) {
		  return $result;
	  } else {
		  return false;
	  }
  }



	



	public function isAuthenticateUser ($email, $password ){
		$query = "  SELECT
					R.id AS Id, 
					R.name AS Name,
					R.email AS Email
					FROM register as R
					WHERE 1=1
					AND R.email='" . $email . "'
					AND R.password='" . $password . "'
					AND R.status='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}	





	public function resetPassword($forgot_email, $new_password, $reset_code ) {
		$query = "	UPDATE register SET
					password=:new_password,
					reset_code=''
					WHERE email='$forgot_email'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':new_password', md5($new_password), PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	public function registerById($id){
		 $query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.image AS Image,
					R.referral_code AS ReferralCode,
					R.code AS Code,
					R.token AS Token,
					R.my_referral_code AS MyReferralCode,
					R.code AS Code,
					R.dash_popup AS DashPopup,
					R.date AS Date
					FROM register R
					WHERE R.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
  
    public function referralUsers($refer_cde){
		 $query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.image AS Image,
					R.referral_code AS ReferralCode,
					R.code AS Code,
					R.token AS Token,
					R.my_referral_code AS MyReferralCode,
					R.code AS Code,
					R.dash_popup AS DashPopup,
					R.date AS Date
					FROM register R
					WHERE R.referral_code='$refer_cde'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function updateProfile($name , $email, $mobile, $new_filename, $date, $id) {
		$query = "	UPDATE register SET
					name=:name,
					email=:email,
					mobile=:mobile,
					image=:image,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':email', $email, PDO::PARAM_STR );
		$stmt->bindValue ( ':mobile', $mobile, PDO::PARAM_STR );
		$stmt->bindValue ( ':image', $new_filename, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}






public function saveMissingReport($user_id, $order_id, $transaction_date, $order_amount, $store_id, $coupon_id,  $source, $other_detail, $date){
$query = "	INSERT INTO missing_report SET
		user_id=:user_id,
		order_id=:order_id,
		transaction_date=:transaction_date,
		order_amount=:order_amount,
		store_id=:store_id,
		coupon_id=:coupon_id,
		source=:source,
		other_detail=:other_detail,
		date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':user_id', $user_id, PDO::PARAM_STR );
		$stmt->bindValue ( ':order_id', $order_id, PDO::PARAM_STR );
		$stmt->bindValue ( ':transaction_date', $transaction_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':order_amount', $order_amount, PDO::PARAM_STR );
		$stmt->bindValue ( ':store_id', $store_id, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_id', $coupon_id, PDO::PARAM_STR );
		$stmt->bindValue ( ':source', $source, PDO::PARAM_STR );
		$stmt->bindValue ( ':other_detail', $other_detail, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
		return $recordId;
		} else {
		return false;
		}

}


public function missingReportList($user_id){
  $query = "SELECT
	M.id AS Id,
	M.user_id AS UserId,
	M.order_id AS OrderId,
	M.transaction_date AS TransactionDate,
	M.order_amount AS OrderAmount,
	M.store_id AS StoreId,
	M.coupon_id AS CouponId,
	M.source AS Source,
	M.other_detail AS OtherDetail,
	M.date AS Date
	FROM missing_report M WHERE
	M.user_id='$user_id'
	ORDER BY M.date DESC";
$stmt = $this->pdo->prepare ( $query );
$stmt->execute ();
$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
if (! empty ( $result )) {
return $result;
} else {
return false;
}


}

public function saveTransactionReport2($user_id, $order_id, $compaign_token, $sub_id, $store_id, $ctw_order_id, $cashback){
    $date = date('Y-m-d');
    
      $query = "INSERT INTO tbl_order SET
        user_id='$user_id',
        uid='$compaign_token',
		sub_id='$sub_id',
		order_id='$order_id',
		store_id= '$store_id',
		trans_date='$date',
		ctw_order_id='$ctw_order_id',
		amount='$cashback',
		date='$date',
		status=1";
		$stmt = $this->pdo->prepare ( $query );
			
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
		    return $recordId;
		} else {
		    return false;
		}
}

public function saveTransactionReport($user_id, $order_id, $compaign_token, $sub_id, $store_id, $ctw_order_id, $cashback){
    $date = date('Y-m-d');
    
      $query = "INSERT INTO tbl_order SET
        user_id='$user_id',
        uid='$compaign_token',
		sub_id='$sub_id',
		order_id='$order_id',
		store_id= '$store_id',
		trans_date='$date',
		ctw_order_id='$ctw_order_id',
		amount='$cashback',
		date='$date',
		status=0";
		$stmt = $this->pdo->prepare ( $query );
			
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
		    return $recordId;
		} else {
		    return false;
		}
}
public function clickReport($click_id, $compaign_token, $sub_id, $order_id, $sale_amount, $currency, $campaign_name, $ctw_order_id, $cashback, $refernce_link, $user_id, $security_token){
    $date = date('Y-m-d');
    
      $query = "INSERT INTO click_report SET
        click_id='$click_id',
        user_id='$user_id',
        campaign_token='$compaign_token',
		sub_id='$sub_id',
		order_id='$order_id',
		sale_amount='$sale_amount',
		currency='$currency',
		campaign_name='$campaign_name',
		ctw_order_id='$ctw_order_id',
		cashback='$cashback',
		refernce_link='$refernce_link',
		security_token='$security_token',
		date='$date'";
		$stmt = $this->pdo->prepare ( $query );
			
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
		    return $recordId;
		} else {
		    return false;
		}
}




public function saveSupport($user_id, $title, $description, $date){
	$query = "	INSERT INTO support SET
			user_id=:user_id,
			title=:title,
			description=:description,
			date=:date";
			$stmt = $this->pdo->prepare ( $query );
			$stmt->bindValue ( ':user_id', $user_id, PDO::PARAM_STR );
			$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
			$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
			$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
			$stmt->execute ();
			$recordId = $this->pdo->lastInsertId ();
			if ($recordId > 0) {
			return $recordId;
			} else {
			return false;
			}
	
	
	
	
	
	}
	
	public function saveEnquiry( $name, $email, $mobile, $subject, $message1,  $date){
	$query = "	INSERT INTO enquiry SET
	        type='1',
			name=:name,
			email=:email,
			mobile=:mobile,
			subject=:subject,
			message=:message,
			date=:date";
			$stmt = $this->pdo->prepare ( $query );
			$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
			$stmt->bindValue ( ':email', $email, PDO::PARAM_STR );
			$stmt->bindValue ( ':mobile', $mobile, PDO::PARAM_STR );
			$stmt->bindValue ( ':subject', $subject, PDO::PARAM_STR );
			$stmt->bindValue ( ':message', $message1, PDO::PARAM_STR );
			$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
			$stmt->execute ();
			$recordId = $this->pdo->lastInsertId ();
			if ($recordId > 0) {
			return $recordId;
			} else {
			return false;
			}
	
	}
	
	public function savePartner( $name, $email, $mobile, $subject, $message1,  $date){
	$query = "	INSERT INTO enquiry SET
	        type='2',
			name=:name,
			email=:email,
			mobile=:mobile,
			subject=:subject,
			message=:message,
			date=:date";
			$stmt = $this->pdo->prepare ( $query );
			$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
			$stmt->bindValue ( ':email', $email, PDO::PARAM_STR );
			$stmt->bindValue ( ':mobile', $mobile, PDO::PARAM_STR );
			$stmt->bindValue ( ':subject', $subject, PDO::PARAM_STR );
			$stmt->bindValue ( ':message', $message1, PDO::PARAM_STR );
			$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
			$stmt->execute ();
			$recordId = $this->pdo->lastInsertId ();
			if ($recordId > 0) {
			return $recordId;
			} else {
			return false;
			}
	
	}
	
	public function saveLander( $name, $email, $mobile,  $date){
  	$query = "	INSERT INTO enquiry SET
	        type='3',
			name=:name,
			email=:email,
			mobile=:mobile,
			date=:date";
			$stmt = $this->pdo->prepare ( $query );
			$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
			$stmt->bindValue ( ':email', $email, PDO::PARAM_STR );
			$stmt->bindValue ( ':mobile', $mobile, PDO::PARAM_STR );
			$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
			$stmt->execute ();
			$recordId = $this->pdo->lastInsertId ();
			if ($recordId > 0) {
			return $recordId;
			} else {
			return false;
			}
	
	}
	
	public function sendMail( $nameFrom, $emailFrom, $nameTo, $emailTo, $subject, $message ) {
         
       
	}
	
	
	
	public function supportList(){
	 $query = "	SELECT
		S.id AS Id,
		S.user_id AS UserId,
		S.title AS Title,
		S.description AS Description,
		S.date AS Date
		FROM support S
		ORDER BY S.date DESC";
	$stmt = $this->pdo->prepare ( $query );
	$stmt->execute ();
	$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
	if (! empty ( $result )) {
	return $result;
	} else {
	return false;
	}
	
	
	}
	
	
	public function updatePopup( $id ) {
		$query = "	UPDATE register SET
					dash_popup='1'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );		
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateResetPasswordOtp($otp, $id) {
		$query = "	UPDATE register SET
					reset_code='$otp'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	
	


	


}





?>