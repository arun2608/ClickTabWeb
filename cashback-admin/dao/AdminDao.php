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
					WHERE B.type='$type'
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
	
	public function transactionReport () {
		$query = "	SELECT
					*
					FROM tbl_order B
					ORDER BY B.id DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function withdrawlReport ($status) {
		$query = "	SELECT
					*
					FROM withdraw_request B
					WHERE status='$status'
					ORDER BY B.id DESC";
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
	
	
	public function updateMissingStatus ($status, $id) {
		$query = "	UPDATE missing_report SET
					status='$status'
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
	
	public function updateTransStatus ($status, $id) {
		$query = "	UPDATE tbl_order SET
					status='$status'
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
	
	public function updatePopularBrands ($brand, $id) {
		$query = "	UPDATE showing_brands SET
					brands='$brand'
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
	
	
	public function updateWithdrawStatus ($status, $id) {
		$query = "	UPDATE withdraw_request SET
					status='$status'
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
	public function clickReport () {
		$query = "	SELECT
					*
					FROM click_report order by id desc";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function bannerById ( $id ) {
		$query = "	SELECT
					B.id AS Id,
					B.type AS Type,
					B.image AS Image,
					B.text_1 AS Text_1,
					B.text_2 AS Text_2,
					B.link AS Link,
					B.date AS Date,
					B.status AS Status
					FROM banner B
					WHERE B.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function landerLink ( $id ) {
		$query = "	SELECT
					B.id AS Id,
					B.store_id AS Store,
					B.coupon_id AS Coupon,
					B.url AS Link
					FROM lander_url B
					WHERE B.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function updateBanner( $text_1, $text_2, $link, $date, $id ) {
		$query = "	UPDATE banner SET
					text_1=:text_1,
					text_2=:text_2,
					link=:link,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':text_1', $text_1, PDO::PARAM_STR );
		$stmt->bindValue ( ':text_2', $text_2, PDO::PARAM_STR );
		$stmt->bindValue ( ':link', $link, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
		public function updateLander( $store_id, $coupon_id, $link ) {
		$query = "	UPDATE lander_url SET
            		store_id='$store_id',
            		coupon_id='$coupon_id',
					url='$link'
					WHERE id='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}


	
	
	public function updateBannerImage( $new_filename, $id ) {
		$query = "	UPDATE banner SET
					image='$new_filename'
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

	
	public function updateCouponImage( $new_filename, $id ) {
		 $query = "	UPDATE coupon SET
					image='$new_filename'
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
	
	public function updateBannerStatus( $status, $date, $id ) {
		$query = "	UPDATE banner SET
					status='$status',
					date='$date'
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


	public function categoryList () {
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.banner AS BannerImage,
					C.category_image AS CategoryImage,
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
	
	public function offerTypelist() {
		$query = "	SELECT
					O.id AS Id,
					O.name AS Name,
					O.status AS Status
					FROM offer_type O
					ORDER BY O.id ASC"; 
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
    
    
    public function offerTypeById ($id) {
		$query = "	SELECT
					O.id AS Id,
					O.name AS Name,
					O.status AS Status
					FROM offer_type O
					WHERE O.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
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
	
	public function checkCategory( $type, $category ) {
		$query = "	SELECT
					C.id AS Id
					FROM category C
					WHERE C.type='$type'
					AND C.category=:category";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function saveCategory( $type, $category, $url, $title, $meta_keyword, $meta_description, $date ) {
		$query = "	INSERT INTO category SET
					type='$type',
					category=:category,
					url=:url,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

		public function	saveTestimonial( $name, $content, $date ) {
		$query = "	INSERT INTO testimonial SET
					name=:name,
					content=:content,
					date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':content', $content, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	public function deleteTestimonial($id){
	    $query = "DELETE FROM testimonial
        WHERE id = '$id'";
        $stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	public function checkCategoryById( $type, $category, $id ) {
		$query = "	SELECT
					C.id AS Id
					FROM category C
					WHERE C.type='$type'
					AND C.category=:category
					AND C.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function updateCategory( $type, $category, $url, $title, $meta_keyword, $meta_description, $date, $id ) {
		$query = "	UPDATE category SET
					type='$type',
					category=:category,
					url=:url,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateCategoryImage( $type, $image, $id ) {
		$query = "	UPDATE category SET
					$type='$image'
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
	
	public function categoryStatus( $status, $date, $id ) {
		$query = "	UPDATE category SET
					status='$status',
					date='$date'
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

	////// Brand /////

	public function brandList ($type) {
		$query = "	SELECT
					C.id AS Id,
					C.brand AS Brand,
					C.date AS Date,
					C.status AS Status
					FROM brand C
					WHERE C.type='$type'
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
	
	public function brandListByType ( $type, $status ) {
		$query = "	SELECT
					C.id AS Id,
					C.brand AS Brand,
					C.date AS Date,
					C.status AS Status
					FROM brand C
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

	public function brandById ($id) {
		$query = "	SELECT
					C.id AS Id,
					C.brand AS Brand,
					C.title AS Title,
					C.meta_keyword AS MetaKeyword,
					C.meta_description AS MetaDescription,
					C.banner AS Banner,
					C.brand_image AS BrandImage,
					C.date AS Date,
					C.status AS Status
					FROM brand C
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
	
	public function checkBrand( $brand ) {
		$query = "	SELECT
					C.id AS Id
					FROM brand C
					WHERE  C.brand='$brand'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function saveBrand( $brand, $url, $title, $meta_keyword, $meta_description, $date ) {
		 $query = "	INSERT INTO brand SET
					brand='$brand',
					url='$url',
					title='$title',
					meta_keyword='$meta_keyword',
					meta_description='$meta_description',
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

	public function checkBrandById( $brand, $id ) {
		$query = "	SELECT
					C.id AS Id
					FROM brand C
					WHERE C.brand='$brand'
					AND C.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function updateBrand( $brand, $url, $title, $meta_keyword, $meta_description, $date, $id ) {
		$query = "	UPDATE brand SET
					brand=:brand,
					url=:url,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':brand', $brand, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );		
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateBrandImage( $type, $image, $id ) {
		$query = "	UPDATE brand SET
					$type='$image'
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


	
	public function brandStatus( $status, $date, $id ) {
		$query = "	UPDATE brand SET
					status='$status',
					date='$date'
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
	/////// End Brand ///////
	
	public function subCatStatus( $status, $date, $id ) {
		$query = "	UPDATE subcat SET
					status='$status',
					date='$date'
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
	
	public function subCatList () {
		$query = "	SELECT
					S.id AS Id,
					S.category AS Category,
					S.subcat AS SubCat,
					S.date AS Date,
					S.status AS Status
					FROM subcat S
					Order By S.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function subCatListByCategory ($category) {
		$query = "	SELECT
					S.id AS Id,
					S.category AS Category,
					S.subcat AS SubCat,
					S.date AS Date,
					S.status AS Status
					FROM subcat S
					WHERE S.status='1'
					AND S.category='$category'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function subCatById ($id) {
		$query = "	SELECT
					S.id AS Id,
					S.category AS Category,
					S.subcat AS SubCat,
					S.title AS Title,
					S.meta_keyword AS MetaKeyword,
					S.meta_description AS MetaDescription,
					S.banner AS Banner,
					S.category_image AS CategoryImage,
					S.date AS Date,
					S.status AS Status
					FROM subcat S
					WHERE S.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function checkSubcat ( $category, $subcat ) {
		$query = "	SELECT
					S.id AS Id
					FROM subcat S
					WHERE S.category='$category'
					AND S.subcat='$subcat'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveSubCat( $category, $subcat, $url, $title, $meta_keyword, $meta_description, $date ) {
		$query = "	INSERT INTO subcat SET
					category=:category,
					subcat=:subcat,					
					url=:url,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':subcat', $subcat, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );				
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function checkSubcatById ( $category, $subcat, $id ) {
		$query = "	SELECT
					S.id AS Id
					FROM subcat S
					WHERE S.category='$category'
					AND S.subcat='$subcat'
					AND S.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateSubCat( $category, $subcat, $url, $title, $meta_keyword, $meta_description, $date, $id ) {
		$query = "	UPDATE subcat SET
					category=:category,
					subcat=:subcat,					
					url=:url,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':subcat', $subcat, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );				
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateSubcatImage( $type, $image, $id ) {
		$query = "	UPDATE subcat SET
					$type='$image'
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
	
	public function checkCollege( $name ) {
		$query = "	SELECT
					P.id AS Id
					FROM college P
					WHERE P.name='$name'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveCollege( $name, $type, $url, $bond, $rating, $rank, $fee, $location, $city, $title, $meta_keyword, $meta_description, $description, $short_description, $date  ) {
		$query = "	INSERT INTO college SET
					name=:name,
					type=:type,
					url=:url,
					bond=:bond,
					rating=:rating,
					rank=:rank,
					fee=:fee,
					location=:location,
					city=:city,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					description=:description,
					short_description=:short_description,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':type', $type, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':bond', $bond, PDO::PARAM_STR );
		$stmt->bindValue ( ':rating', $rating, PDO::PARAM_STR );
		$stmt->bindValue ( ':rank', $rank, PDO::PARAM_STR );
		$stmt->bindValue ( ':fee', $fee, PDO::PARAM_STR );
		$stmt->bindValue ( ':location', $location, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->bindValue ( ':short_description', $short_description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false; 
		}
	}
	
	
	
	public function checkCollegeById( $name, $id ) {
		$query = "	SELECT
					P.id AS Id
					FROM college P
					WHERE P.name='$name'
					AND P.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}


	public function cityListByLocation( $id ) {
		$query = "	SELECT
					P.id AS Id,
					P.city AS City
					FROM city P
					WHERE P.state='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateCollege( $name, $type, $url, $bond, $rating, $rank, $fee, $location, $city, $title, $meta_keyword, $meta_description, $description, $short_description, $date,$id ) {
	$query = "	UPDATE college SET
					name=:name,
					type=:type,
					url=:url,
					bond=:bond,
					rating=:rating,
					rank=:rank,
					fee=:fee,
					location=:location,
					city=:city,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					description=:description,
					short_description=:short_description,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':type', $type, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':bond', $bond, PDO::PARAM_STR );
		$stmt->bindValue ( ':rating', $rating, PDO::PARAM_STR );
		$stmt->bindValue ( ':rank', $rank, PDO::PARAM_STR );
		$stmt->bindValue ( ':fee', $fee, PDO::PARAM_STR );
		$stmt->bindValue ( ':location', $location, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->bindValue ( ':short_description', $short_description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateCollegeImage ( $product_image, $id) {
		$query = "	UPDATE college SET
		            product_image='$product_image'
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
	
	
	
	
	public function saveCollegeGalleryImage ( $image, $college_id ) {
		$query = "	INSERT INTO college_image SET
					image=:image,
					college_id=:college_id";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':image', $image, PDO::PARAM_STR );
		$stmt->bindValue ( ':college_id', $college_id, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function collegeStatus( $status, $date, $id ) {
		$query = "	UPDATE college SET
					status='$status',
					date='$date'
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
	
	public function deleteCollege ( $id ) {
		$query = "	DELETE FROM college 
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
	
	public function deleteCollegeImageById ( $id ) {
		$query = "	DELETE FROM college_image WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function deleteCollegeImage ( $id ) {
		$query = "	DELETE FROM college_image WHERE college_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function collegeList() {
		$query = "	SELECT
					P.id AS Id,
					P.name AS Name,
					P.type AS Type,
					P.url AS Url,
					P.bond AS Bond,
					P.rank AS Rank,
					P.fee AS Fee,
					P.location AS Location,
					P.city AS City,
					P.title AS Title,
					P.meta_keyword AS MetaKeyword,
					P.meta_description AS MetaDescription,
					P.description AS Description,
					P.short_description AS ShortDescription,
					P.product_image AS ProductImage,	
					P.date AS Date,
					P.status AS Status
					FROM college P
					ORDER BY P.status ASC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function collegeById($id) {
		$query = "	SELECT
					P.id AS Id,
					P.name AS Name,
					P.type AS Type,
					P.url AS Url,
					P.bond AS Bond,
					P.rank AS Rank,
					P.fee AS Fee,
					P.rating AS Rating,
					P.location AS Location,
					P.city AS City,
					P.title AS Title,
					P.meta_keyword AS MetaKeyword,
					P.meta_description AS MetaDescription,
					P.description AS Description,
					P.short_description AS ShortDescription,
					P.product_image AS ProductImage,	
					P.date AS Date,
					P.status AS Status
					FROM college P
					WHERE P.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	public function collegeImageListByCollegeId( $college_id ) {
		 $query = "	SELECT
					P.id AS Id,
					P.image AS Image
					FROM college_image P
					WHERE P.college_id='$college_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function checkBlog( $heading ) {
		$query = "	SELECT
					B.id AS Id
					FROM blog B
					WHERE B.heading='$heading'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveBlog( $heading, $url, $name, $short_description, $title, $meta_keyword, $meta_description, $description, $blog_date, $date ) {
		$query = "	INSERT INTO blog SET
					heading=:heading,					
					url=:url,
					name=:name,
					short_description=:short_description,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					description=:description,
					blog_date='$blog_date',
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':heading', $heading, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':short_description', $short_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function updateBlogImage( $new_filename, $id ) {
		$query = "	UPDATE blog SET
					image='$new_filename'
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
	
	public function blogStatus( $status, $date, $id ) {
		$query = "	UPDATE blog SET
					status='$status',
					date='$date'
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
	
	public function deleteblog( $id ) {
		$query = "	DELETE FROM blog
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
	
	public function deleteUser( $id ) {
		$query = "	DELETE FROM register
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
					FROM blog B";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function blogById($id) {
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
					WHERE B.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function checkBlogById( $heading, $id ) {
		$query = "	SELECT
					B.id AS Id
					FROM blog B
					WHERE B.heading='$heading'
					AND B.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateBlog( $heading, $url, $name, $short_description, $title, $meta_keyword, $meta_description, $description, $blog_date, $date, $id ) {
		$query = "	UPDATE blog SET
					heading=:heading,					
					url=:url,
					name=:name,
					short_description=:short_description,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					description=:description,
					blog_date='$blog_date',
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':heading', $heading, PDO::PARAM_STR );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':short_description', $short_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function userList() {
		$query = "	SELECT
					R.id AS Id,
					R.code AS Code,
					R.token AS Token,
					R.name AS Name,
					R.email AS Email,
					R.mobile AS Mobile,
					R.referral_code AS ReferralCode,
					R.my_referral_code AS MyRefCode,
					R.date AS Date
					FROM register R
					ORDER BY R.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
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
	
	public function updateAbout($id, $heading, $subHeading, $history, $mission, $vision,  $description, $title, $metaTag, $metaDescription, $url, $date){
		$query = "	UPDATE about SET
					heading=:heading,
					sub_heading=:subHeading,
					history=:history,
					mission=:mission,
					vision=:vision,
					description=:description,
					title=:title,
					meta_tag=:metaTag,
					meta_description=:metaDescription,
					url=:url,
					date='$date'
					where id='$id'";
		$stmt=$this->pdo->prepare($query);
		$stmt->bindValue(':heading', $heading, PDO::PARAM_STR);
		$stmt->bindValue(':subHeading', $subHeading, PDO::PARAM_STR);
		$stmt->bindValue(':history', $history, PDO::PARAM_STR);
		$stmt->bindValue(':mission', $mission, PDO::PARAM_STR);
		$stmt->bindValue(':vision', $vision, PDO::PARAM_STR);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);
		$stmt->bindValue(':metaTag', $metaTag, PDO::PARAM_STR);
		$stmt->bindValue(':metaDescription', $metaDescription, PDO::PARAM_STR);
		$stmt->bindValue(':url', $url, PDO::PARAM_STR);
		$stmt->execute();
		$recordId=$stmt->rowCount();
		if($recordId>0){
			return $recordId;
		}else{
			return false;
		}
	}

	public function updateAboutImage( $new_filename, $type, $id) {
		$query = " UPDATE about SET
				   $type='$new_filename'
				   WHERE id='$id'";
        $stmt = $this->pdo->prepare($query);        
        $stmt->execute();
        $recordId = $stmt->rowCount ();
        if ($recordId > 0) {
            return $recordId;
        } else {
            return false;
        }
    }
	
	
	public function enquiryList($type) {
		$query = "	SELECT
					E.id AS Id,
					E.name AS Name,
					E.email AS Email,
					E.mobile AS Mobile,
					E.subject AS Subject,
					E.message AS Message,
					E.date AS Date,
					E.status AS Status					
					FROM enquiry E
				    WHERE E.type='".$type."'
					ORDER BY E.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function applyNowList() {
		$query = "	SELECT
					E.id AS Id,
					E.name AS Name,
					E.email AS Email,
					E.mobile AS Mobile,
					E.message AS Message,
					E.college AS College,
					E.loan_amount AS LoanAmount,
					E.date AS Date,
					E.status AS Status					
					FROM apply_now E
					ORDER BY E.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function siteControlListByType ($type){ 
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
					SC.title AS Title,
					SC.meta_keyword AS MetaKeyword,
					SC.meta_description AS MetaDescription,
					SC.url AS Url,
					SC.link AS Link,										
					SC.date AS Date,
					SC.status AS Status
					FROM site_control SC
					WHERE SC.type='$type'
					ORDER BY SC.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function pageListByType ($type){ 
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
					SC.title AS Title,
					SC.meta_keyword AS MetaKeyword,
					SC.meta_description AS MetaDescription,
					SC.url AS Url,
					SC.link AS Link,										
					SC.date AS Date,
					SC.status AS Status
					FROM site_control SC
					WHERE SC.type='$type'
					AND SC.status='1'
					ORDER BY SC.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
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
	
	
	public function updateSiteControlImage ( $type, $image, $id ) {
		$query = "	UPDATE site_control SET
					$type='$image'
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
	
	public function siteControlStatus( $status, $date, $id ) {
		$query = "	UPDATE site_control SET
					status='$status',
					date='$date'
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
	
	public function checkPageById( $heading_1, $id ){
		$query = "  SELECT
					SC.id AS Id
					FROM site_control as SC
					WHERE SC.type='8'
					AND SC.heading_1='$heading_1'
					AND SC.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updatePage( $url, $heading_1, $heading_2, $title, $meta_keyword, $meta_description, $date, $id ) {
		$query = "	UPDATE site_control SET
					url=:url,
					heading_1=:heading_1,
					heading_2=:heading_2,
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':url', $url, PDO::PARAM_STR );
		$stmt->bindValue ( ':heading_1', $heading_1, PDO::PARAM_STR );
		$stmt->bindValue ( ':heading_2', $heading_2, PDO::PARAM_STR );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	
	public function userStatus( $status, $date, $id ) {
		$query = "	UPDATE client SET
					status='$status'
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
	
	public function subscriptionList(){
		$query = "  SELECT
					NL.id AS Id,
					NL.email AS Email,
					NL.mobile AS Mobile,
					NL.date AS Date,
					NL.status AS Status
					FROM newsletter as NL
					ORDER BY NL.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateTitleKeyword( $title, $meta_keyword, $meta_description, $date, $id ) {
		$query = "	UPDATE site_control SET
					title=:title,
					meta_keyword=:meta_keyword,
					meta_description=:meta_description,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':title', $title, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_keyword', $meta_keyword, PDO::PARAM_STR );
		$stmt->bindValue ( ':meta_description', $meta_description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	
	public function checkPincode( $delivery_type, $area, $pincode ) {
		$query = "	SELECT
					P.id AS Id
					FROM pincode P
					WHERE P.delivery_type='$delivery_type'
					AND P.area='$area'
					AND P.pincode='$pincode'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function savePincode( $delivery_type, $area, $pincode, $date ) {
		$query = "	INSERT INTO pincode SET
				    delivery_type=:delivery_type,	
					area=:area,
					pincode=:pincode,
					date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':delivery_type', $delivery_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':area', $area, PDO::PARAM_STR );
		$stmt->bindValue ( ':pincode', $pincode, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );				
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function checkPincodeById( $delivery_type, $area, $pincode, $id ) {
		$query = "	SELECT
					P.id AS Id
					FROM pincode P
					WHERE P.delivery_type='$delivery_type'
					AND P.area='$area'
					AND P.pincode='$pincode'
					AND P.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updatePincode( $delivery_type, $area, $pincode, $date, $id ) {
		$query = "	UPDATE pincode SET
					delivery_type=:delivery_type,
					pincode=:pincode,
					area=:area,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':delivery_type', $delivery_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':pincode', $pincode, PDO::PARAM_STR );
		$stmt->bindValue ( ':area', $area, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function pincodeList() {
		$query = "	SELECT
					P.id AS Id,
					P.delivery_type AS DeliveryType,
					P.area AS Area,
					P.pincode AS Pincode,
					P.date AS Date,
					P.status AS Status
					FROM pincode P
					ORDER BY P.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function pincodeById($id) {
		$query = "	SELECT
					P.id AS Id,
					P.delivery_type AS DeliveryType,
					P.area AS Area,
					P.pincode AS Pincode,
					P.date AS Date,
					P.status AS Status
					FROM pincode P
					WHERE P.id='$id' ";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function homeCategoryProductStatus( $status, $id ) {
		$query = "	UPDATE category SET
					home_product='$status'
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
	
	
	public function orderById( $id ){ 
		$query = "	SELECT
					O.id AS Id,
					O.order_id AS OrderId,
					O.name AS Name,
					O.email AS Email,
					O.mobile AS Mobile,
					O.address AS Address,
					O.pincode AS Pincode,
					O.state AS State,
					O.city AS City,
					O.area AS Area,
					O.landmark AS Landmark,
					O.delivery AS Delivery,
					O.comment AS Comment,
					O.payment_type AS PaymentType,
					O.coupon_id AS CouponId,
					O.coupon_code AS CouponCode,
					O.coupon_amount AS CouponAmount,
					O.coupon_type AS CouponType,
					O.date AS Date,
					O.status AS Status
					FROM tbl_order O
					WHERE O.id='$id'
					AND O.status='2'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function orderDetailListById( $tbl_id ){ 
		$query = "	SELECT
					O.id AS Id,
					O.category AS Category,
					O.subcat AS SubCat,
					O.product_name AS ProductName,
					O.mrp AS Mrp,
					O.price AS Price,
					O.qty AS Qty,
					O.weight AS Weight
					FROM tbl_order_detail O
					WHERE O.tbl_id='$tbl_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}	
	
	public function orderList(){ 
		$query = "	SELECT
					O.id AS Id,
					O.order_id AS OrderId,
					O.name AS Name,
					O.email AS Email,
					O.mobile AS Mobile,
					O.address AS Address,
					O.pincode AS Pincode,
					O.state AS State,
					O.city AS City,
					O.delivery AS Delivery,
					O.comment AS Comment,
					O.payment_type AS PaymentType,
					O.coupon_id AS CouponId,
					O.coupon_code AS CouponCode,
					O.coupon_amount AS CouponAmount,
					O.coupon_type AS CouponType,
					O.date AS Date,
					O.status AS Status,
					O.order_status AS OrderStatus
					FROM tbl_order O
					WHERE O.status='2'
					ORDER BY O.order_id DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function stateById($id){
		$query = "	SELECT
					S.id AS Id,
					S.state AS State
					FROM state S
					WHERE S.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function cityListByState($state){
		$query = "	SELECT
					C.id AS Id,
					C.city AS City
					FROM city C
					WHERE C.status='1'
					AND C.state='$state'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function cityById($id){
		$query = "	SELECT
					C.id AS Id,
					C.state AS State,
					C.city AS City
					FROM city C
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
	
	public function updateCancelOrderStatus( $id ) {
		$query = "	UPDATE tbl_order SET
					order_status='3'
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
	
	public function updateDeliveredOrderStatus( $id ) {
		$query = "	UPDATE tbl_order SET
					order_status='4'
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
	
	public function saveDeliveryTime( $delivery_date, $delivery_time, $date ) {
		$query = "	INSERT INTO scheduling SET
				    delivery_date=:delivery_date,	
					delivery_time=:delivery_time,
					date=:date";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':delivery_date', $delivery_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':delivery_time', $delivery_time, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );				
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function schedulingList(){
		$query = "	SELECT
					S.id AS Id,
					S.delivery_date AS DeliveryDate,
					S.delivery_time AS DeliveryTime,
					S.date AS Date,
					S.status AS status
					FROM scheduling S";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function schedulingById($id){
		$query = "	SELECT
					S.id AS Id,
					S.delivery_date AS DeliveryDate,
					S.delivery_time AS DeliveryTime,
					S.date AS Date,
					S.status AS status
					FROM scheduling S
					WHERE S.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateDeliveryTime( $delivery_date, $delivery_time, $date, $id ) {
		$query = "	UPDATE scheduling SET
				    delivery_date=:delivery_date,	
					delivery_time=:delivery_time,
					date=:date
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':delivery_date', $delivery_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':delivery_time', $delivery_time, PDO::PARAM_STR );
		$stmt->bindValue ( ':date', $date, PDO::PARAM_STR );				
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function orderFeedbackList($order_id){
		$query = "	SELECT
					O.id AS Id,
					O.order_id AS OrderId,
					O.client_id AS ClientId,
					O.star_rating AS StarRating,
					O.delivery_issue AS DeliveryIssue,
					O.comment AS Comment,
					O.date AS Date
					FROM order_feedback O
					WHERE O.order_id='$order_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function countFeedbackById($order_id){
		$query = "	SELECT
					COUNT(O.id) AS TotalFeedback
					FROM order_feedback O
					WHERE O.order_id='$order_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function productStockByProductId( $product_id ) {
		$query = "	SELECT
					P.id AS Id
					FROM product_price P
					WHERE P.product_id='$product_id'
					AND P.stock='0'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}


	public function checkCoupon( $coupon_code ){
		$query = "	SELECT
					C.id AS Id
					FROM coupon C 
					WHERE C.coupon_code='$coupon_code'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveCoupon( $type, $category, $store, $coupon_heading, $coupon_excerpt, $coupon_code, $offer_type ,$coupon_price, $cashback_amt ,$mrp, $image, $order_amount, $coupon_user, $coupon_start_date, $coupon_end_date, $comp_link, $handpicked, $top20, $offer, $verified, $link,$content1, $content2, $content3, $slug, $date ) {
		 $query = "	INSERT INTO coupon SET
					type='$type',
					category='$category',
					store='$store',
					coupon_heading='$coupon_heading',
					coupon_excerpt='$coupon_excerpt',
					coupon_code='$coupon_code',
					offer_type='$offer_type',
					coupon_price='$coupon_price',
					cashback_amt='$cashback_amt',
					mrp='$mrp',
					image='$image',
					order_amount='$order_amount',
					coupon_user='$coupon_user',
					coupon_start_date='$coupon_start_date',
					coupon_end_date='$coupon_end_date',
					comp_link='$comp_link',
					handpicked='$handpicked',
					top20='$top20',
					offer='$offer',
					verified='$verified',
					link='$link',
					content1='$content1',
					content2='$content2',
					content3='$content3',
					slug='$slug',
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		// $stmt->bindValue ( ':type', $type, PDO::PARAM_STR );
		// $stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		// $stmt->bindValue ( ':store', $store, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_heading', $coupon_heading, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_excerpt', $coupon_excerpt, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_code', $coupon_code, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_price', $coupon_price, PDO::PARAM_STR );
		// $stmt->bindValue ( ':order_amount', $order_amount, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_user', $coupon_user, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_start_date', $coupon_start_date, PDO::PARAM_STR );
		// $stmt->bindValue ( ':coupon_end_date', $coupon_end_date, PDO::PARAM_STR );
		// $stmt->bindValue ( ':handpicked', $handpicked, PDO::PARAM_STR );
		// $stmt->bindValue ( ':top20', $top20, PDO::PARAM_STR );
		// $stmt->bindValue ( ':offer', $offer, PDO::PARAM_STR );
		// $stmt->bindValue ( ':verified', $verified, PDO::PARAM_STR );
		// $stmt->bindValue ( ':link', $link, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
		
	public function checkCouponById( $coupon_code, $id ){
		$query = "	SELECT
					C.id AS Id
					FROM coupon C 
					WHERE C.coupon_code='$coupon_code'
					AND C.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateCoupon( $type, $category, $store, $coupon_heading, $coupon_excerpt, $coupon_code,$offer_type, $coupon_price, $cashback_amt ,$mrp, $image, $order_amount, $coupon_user, $coupon_start_date, $coupon_end_date, $comp_link, $handpicked, $top20, $offer, $verified, $link, $content1, $content2, $content3, $slug, $date, $id ) {
		$query = "	UPDATE coupon SET
					type=:type,
					category=:category,
					store=:store,
					coupon_heading=:coupon_heading,
					coupon_excerpt=:coupon_excerpt,
					coupon_code=:coupon_code,
					offer_type=:offer_type,
					coupon_price=:coupon_price,
					cashback_amt=:cashback_amt,
					mrp=:mrp,
					image=:image,
					order_amount=:order_amount,
					coupon_user=:coupon_user,
					coupon_start_date=:coupon_start_date,
					coupon_end_date=:coupon_end_date,
					comp_link=:comp_link,
					handpicked=:handpicked,
					top20=:top20,
					offer=:offer,
					verified=:verified,
					link=:link,
					content1=:content1,
					content2=:content2,
					content3=:content3,
					slug=:slug,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':type', $type, PDO::PARAM_STR );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':store', $store, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_heading', $coupon_heading, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_excerpt', $coupon_excerpt, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_code', $coupon_code, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer_type', $offer_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_price', $coupon_price, PDO::PARAM_STR );
		$stmt->bindValue ( ':cashback_amt', $cashback_amt, PDO::PARAM_STR );
		$stmt->bindValue ( ':mrp', $mrp, PDO::PARAM_STR );
		$stmt->bindValue ( ':image', $image, PDO::PARAM_STR );
		$stmt->bindValue ( ':order_amount', $order_amount, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_user', $coupon_user, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_start_date', $coupon_start_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':coupon_end_date', $coupon_end_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':comp_link', $comp_link, PDO::PARAM_STR );
		$stmt->bindValue ( ':handpicked', $handpicked, PDO::PARAM_STR );
		$stmt->bindValue ( ':top20', $top20, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer', $offer, PDO::PARAM_STR );
		$stmt->bindValue ( ':verified', $verified, PDO::PARAM_STR );
		$stmt->bindValue ( ':link', $link, PDO::PARAM_STR );
		$stmt->bindValue ( ':content1', $content1, PDO::PARAM_STR );
		$stmt->bindValue ( ':content2', $content2, PDO::PARAM_STR );
		$stmt->bindValue ( ':content3', $content3, PDO::PARAM_STR );
		$stmt->bindValue ( ':slug', $slug, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function couponList(){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.coupon_heading AS CouponHeading,
					C.store AS Store, 
					C.coupon_code AS CouponCode,
					C.coupon_excerpt AS CouponExcerpt,
					C.cashback_amt AS CashbackAmt,
					C.mrp AS MRP,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.comp_link AS CompaignLink,
					C.image AS Image,
					C.handpicked AS HandPicked,
					C.offer_type AS OfferType,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.content1 AS Content1,
					C.content2 AS Content2,
				    C.content3 AS Content3,
					C.category AS Category,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
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
	
	public function couponByStore($store){
		$query = "	SELECT
					C.id AS Id,
					C.type AS Type,
					C.category AS Category,
					C.coupon_heading AS CouponHeading,
					C.store AS Store, 
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.comp_link AS CompaignLink,
					C.offer_type AS OfferType,
					C.offer AS Offer,
					C.category AS Category,
					C.date AS Date,
					C.status AS Status
					FROM coupon C
					WHERE C.store='$store'
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
					C.slug AS Slug,
					C.store AS Store,
					C.coupon_heading AS CouponHeading,
					C.coupon_excerpt AS CouponExcerpt,
					C.coupon_code AS CouponCode,
					C.coupon_price AS CouponPrice,
					C.cashback_amt AS CashbackAMT,
					C.mrp AS Mrp,
					C.order_amount AS OrderAmount,
					C.coupon_user AS CouponUser,
					C.coupon_start_date AS CouponStartDate,
					C.coupon_end_date AS CouponEndDate,
					C.handpicked AS Handpicked,
					C.offer AS Offer,
					C.top20 AS Top20,
					C.verified AS Verified,
					C.link AS Link,
					C.comp_link AS CompLink,
					C.offer_type AS OfferType,
					C.content1 AS Content1,
					C.content2 AS Content2,
					C.content3 AS Content3,
					C.image AS Image,
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
	
	public function couponStatus( $status, $date, $id ) {
		$query = "	UPDATE coupon SET
					status=:status,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':status', $status, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
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

	public function saveReguser($category, $name, $image, $com_status, $com_trending, $com_deeplink, $com_offer_title,$com_meta_title, $offer_type,$offer_value , $default_tacking, $esti_cashback_date,  $avg_tracking_speed, $avg_claim_time, $cashback_rate, $link, $slug, $token, $description, $date ) {
		$query = "	INSERT INTO reguser SET
					category=:category,
					name=:name,
					image=:image,
					com_status=:com_status,
					com_trending=:com_trending,
					com_deeplink=:com_deeplink,
					com_offer_title=:com_offer_title,
					com_meta_title=:com_meta_title,
					offer_type=:offer_type,
					offer_value=:offer_value,
					default_tacking=:default_tacking,
					esti_cashback_date=:esti_cashback_date,
					avg_tracking_speed=:avg_tracking_speed,
					avg_claim_time=:avg_claim_time,
					cashback_rate=:cashback_rate,
					link=:link,
					slug=:slug,
					token=:token,
					description=:description,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':image', $image, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_status', $com_status, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_trending', $com_trending, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_deeplink', $com_deeplink, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_offer_title', $com_offer_title, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_meta_title', $com_meta_title, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer_type', $offer_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer_value', $offer_value, PDO::PARAM_STR );
		$stmt->bindValue ( ':default_tacking', $default_tacking, PDO::PARAM_STR );
		$stmt->bindValue ( ':esti_cashback_date', $esti_cashback_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':avg_tracking_speed', $avg_tracking_speed, PDO::PARAM_STR );
		$stmt->bindValue ( ':avg_claim_time', $avg_claim_time, PDO::PARAM_STR );
		$stmt->bindValue ( ':cashback_rate', $cashback_rate, PDO::PARAM_STR );
		$stmt->bindValue ( ':link', $link, PDO::PARAM_STR );
		$stmt->bindValue ( ':slug', $slug, PDO::PARAM_STR );
		$stmt->bindValue ( ':token', $token, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}


	public function saveSearchingData($store_id,$searching_keywords,$date) {
		$query = "	INSERT INTO search_keyword SET
					store_id=:store_id,
					searching_keywords=:searching_keywords,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':store_id', $store_id, PDO::PARAM_STR );
		$stmt->bindValue ( ':searching_keywords', $searching_keywords, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}


	public function saveCouponkeywordData($id,$searching_keywords,$date) {
		$query = "	INSERT INTO coupon_keyword SET
					coupon_id=:coupon_id,
					searching_keywords=:searching_keywords,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':coupon_id', $id, PDO::PARAM_STR );
		$stmt->bindValue ( ':searching_keywords', $searching_keywords, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}



	public function updateReguser($category, $name, $image, $com_status, $com_trending, $com_deeplink, $com_offer_title, $com_meta_title, $offer_type, $offer_value, $default_tacking, $esti_cashback_date, $avg_tracking_speed, $avg_claim_time, $cashback_rate, $link,$slug, $description, $date,$id ) {
		$query = "	UPDATE reguser SET
					category=:category,
					name=:name,
					image=:image,
					com_status=:com_status,
					com_trending=:com_trending,
					com_deeplink=:com_deeplink,
					com_offer_title=:com_offer_title,
					com_meta_title=:com_meta_title,
					offer_type=:offer_type,
					offer_value=:offer_value,
					default_tacking=:default_tacking,
					esti_cashback_date=:esti_cashback_date,
					avg_tracking_speed=:avg_tracking_speed,
					avg_claim_time=:avg_claim_time,
					cashback_rate=:cashback_rate,
					description=:description,
					link=:link,
					slug=:slug,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':category', $category, PDO::PARAM_STR );
		$stmt->bindValue ( ':name', $name, PDO::PARAM_STR );
		$stmt->bindValue ( ':image', $image, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_status', $com_status, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_trending', $com_trending, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_deeplink', $com_deeplink, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_offer_title', $com_offer_title, PDO::PARAM_STR );
		$stmt->bindValue ( ':com_meta_title', $com_meta_title, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer_type', $offer_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':offer_value', $offer_value, PDO::PARAM_STR );
		$stmt->bindValue ( ':default_tacking', $default_tacking, PDO::PARAM_STR );
		$stmt->bindValue ( ':esti_cashback_date', $esti_cashback_date, PDO::PARAM_STR );
		$stmt->bindValue ( ':avg_tracking_speed', $avg_tracking_speed, PDO::PARAM_STR );
		$stmt->bindValue ( ':avg_claim_time', $avg_claim_time, PDO::PARAM_STR );
		$stmt->bindValue ( ':cashback_rate', $cashback_rate, PDO::PARAM_STR );
		$stmt->bindValue ( ':link', $link, PDO::PARAM_STR );
		$stmt->bindValue ( ':description', $description, PDO::PARAM_STR );
		$stmt->bindValue ( ':slug', $slug, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}



	public function deleteKeyword ( $id ) {
		$query = "DELETE FROM search_keyword 
		            WHERE store_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	public function deleteCouponKeyword ( $id ) {
		$query = "DELETE FROM coupon_keyword 
		            WHERE coupon_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	
	

	public function updateImage( $type, $image, $id ) {
		$query = "	UPDATE reguser SET
					$type='$image'
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


	      

	public function ReguserList(){
		$query = "	SELECT
					R.id AS Id,
					R.name AS Name,
					R.category AS CategoryId,
					R.image AS Image,
					R.com_deeplink AS Deeplink,
					R.com_trending AS Com_Trending,
					R.com_offer_title AS Com_Offer_Title,
					R.com_meta_title AS Com_Meta_Title,
					R.offer_value AS OfferValue,
					R.offer_type AS OfferType,
					R.default_tacking AS Default_Tacking,
					R.esti_cashback_date AS Esti_Cashback_Date,
					R.avg_tracking_speed AS Avg_Tracking_Speed,
					R.avg_claim_time AS Avg_Claim_Time,
					R.description AS Description,
					R.cashback_rate AS Cashback_Rate,
					R.link AS Link,
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

	public function KeywordSearchByStoreId($store_id){
		 $query = "	SELECT
					K.id AS Id,
					K.store_id AS StoreId,
					K.searching_keywords AS Keyword,
					K.date AS Date
					FROM search_keyword K WHERE 
					K.store_id='$store_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}


	public function KeywordByCouponId($coupon_id){
		$query = "	SELECT
				   K.id AS Id,
				   K.coupon_id AS CouponId,
				   K.searching_keywords AS Keyword,
				   K.date AS Date
				   FROM coupon_keyword K WHERE 
				   K.coupon_id='$coupon_id'";
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

	public function storeList(){
		$query = "	SELECT
					A.id AS Id,
					A.name AS Name,
					A.date AS Date
					FROM reguser A";
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
		$query = "	SELECT
					R.id AS Id,
					R.category AS Category,
					R.token AS Token,
					R.name AS Name,
					R.image AS Image,
					R.com_status AS CompStatus,
					R.com_trending AS CompTrending,
					R.com_deeplink AS CompDeeplink,
					R.com_offer_title AS CompOfferTitle,
					R.com_meta_title AS CompMetaTitle,
					R.offer_type AS OfferType,
					R.offer_value AS OfferValue,
					R.default_tacking AS DefaultTacking,
					R.esti_cashback_date AS EstiCashbackDate,
					R.avg_tracking_speed AS AvgTrackingSpeed,
					R.avg_claim_time AS AvgClaimTime,
					R.cashback_rate AS CashbackRate,
					R.link AS StoreLink,
					R.email AS Email,
					R.mobile AS Mobile,
					R.address AS Address,
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

	public function deleteReguser( $id ) {
		$query = "	DELETE FROM reguser
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





	public function stateListByStatus($status){
		$query = "	SELECT
					S.id AS Id,
					S.state AS State
					FROM state S
					WHERE S.status='$status'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function saveArea( $state, $city, $delivery_type, $area, $date ) {
		$query = "	INSERT INTO area SET
					state=:state,
					city=:city,
					delivery_type=:delivery_type,
					area=:area,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->bindValue ( ':delivery_type', $delivery_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':area', $area, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}

	public function updateArea( $state, $city, $delivery_type, $area, $date, $id ) {
		$query = "	UPDATE area SET
					state=:state,
					city=:city,
					delivery_type=:delivery_type,
					area=:area,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->bindValue ( ':delivery_type', $delivery_type, PDO::PARAM_STR );
		$stmt->bindValue ( ':area', $area, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function areaList(){
		$query = "	SELECT
					A.id AS Id,
					A.state AS State,
					A.city AS City,
					A.delivery_type AS DeliveryType,
					A.area AS Area,
					A.date AS Date,
					A.status AS Status
					FROM area A";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function areaListByStatus($status){
		$query = "	SELECT
					A.id AS Id,
					A.state AS State,
					A.city AS City,
					A.delivery_type AS DeliveryType,
					A.area AS Area,
					A.area AS Area,
					A.date AS Date,
					A.status AS Status
					FROM area A
					WHERE A.status='$status'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function areaById($id){
		$query = "	SELECT
					A.id AS Id,
					A.state AS State,
					A.city AS City,
					A.delivery_type AS DeliveryType,
					A.area AS Area,
					A.date AS Date,
					A.status AS Status
					FROM area A
					WHERE A.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	function sendOrderMessage($Phno,$Msg,$Password,$SID,$UserID,$TemplateID){         
		$ch='';
		
		$EntityID='1701160509719815657';
        $SenderID ="EFMART";

        $url='http://nimbusit.biz/api/SmsApi/SendSingleApi?UserID='.$UserID.'&Password='.$Password.'&SenderID='.$SenderID.'&Phno='.$Phno.'&Msg='.urlencode($Msg).'&EntityID='.$EntityID.'&TemplateID='.$TemplateID;
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $output=curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    public function checkState( $state ){
		$query = "	SELECT
					S.id AS Id,
					S.state AS State
					FROM state S
					WHERE S.state='$state'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function saveState( $state, $date ) {
		$query = "	INSERT INTO state SET
					state=:state,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function checkStateById( $state, $id ){
		$query = "	SELECT
					S.id AS Id,
					S.state AS State
					FROM state S
					WHERE S.state='$state'
					AND S.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function updateState( $state, $date, $id ) {
		$query = "	UPDATE state SET
					state=:state,
					date='$date'
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function stateList(){
		$query = "	SELECT
					S.id AS Id,
					S.state AS State,
					S.date AS Date
					FROM state S
					ORDER By S.date DESC";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function checkCity( $state, $city ){
		$query = "	SELECT
					C.id AS Id
					FROM city C
					WHERE C.state='$state'
					AND C.city='$city'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function saveCity( $state, $city, $date ) {
		$query = "	INSERT INTO city SET
					state=:state,
					city=:city,
					date='$date'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	
	public function checkCityById( $state, $city, $id ){
		$query = "	SELECT
					C.id AS Id
					FROM city C
					WHERE C.state='$state'
					AND C.city='$city'
					AND C.id!='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}

	public function updateCity( $state, $city, $date, $id ) {
		$query = "	UPDATE city SET
					state=:state,
					city=:city,
					date='$date'	
					WHERE id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':state', $state, PDO::PARAM_STR );
		$stmt->bindValue ( ':city', $city, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function cityList(){
		$query = "	SELECT
					C.id AS Id,
					C.state AS State,
					C.city AS City,
					C.date AS Date
					FROM city C
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
	
		public function budgetCollegeList($budget_id){
		 $query = "	SELECT
					*
					FROM budget_college C
					WHERE C.budget_id='$budget_id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function deleteBudgetCollege($budget_id){
	    	$query = "	DELETE FROM budget_college 
					WHERE budget_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function saveBudgetCollege( $budget_id, $college_id ) {
		$query = "	INSERT INTO budget_college SET
					budget_id='$budget_id',
					college_id='$college_id'
					";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	

	public function missingReportList(){
		$query = "	SELECT
		   M.id AS Id,
		   M.user_id AS UserId,
		   M.order_id AS OrderId,
		   M.transaction_date AS TransactionDate,
		   M.order_amount AS OrderAmount,
		   M.store_id AS StoreId,
		   M.coupon_id AS CouponId,
		   M.source AS Source,
		   M.other_detail AS OtherDetail,
		   M.date AS Date,
		   M.status AS Status
		   FROM missing_report M
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


		  public function registerById($id){
			$query = "	SELECT
					   R.id AS Id,
					   R.name AS Name,
					   R.email AS Email,
					   R.mobile AS Mobile,
					   R.referral_code AS ReferralCode,
					   R.my_referral_code AS MyReferralCode,
					   R.code AS Code,
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
	 
   

    public function saveTransactionReport($user_id, $order_id, $compaign_token, $sub_id, $store_id, $ctw_order_id, $cashback, $status, $date){

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
    		status='$status'";
    		$stmt = $this->pdo->prepare ( $query );
    			
    		$stmt->execute ();
    		$recordId = $this->pdo->lastInsertId ();
    		if ($recordId > 0) {
    		    return $recordId;
    		} else {
    		    return false;
    		}
    }





}










?>