<?php
	
	class DB {

		private $connection;

		function __construct() {
			$this->connection = new PDO("mysql:host=localhost;dbname=Ryno","ryno", "ryno5tand!");
		}

		function getProducts() {
			$sql = "SELECT * FROM products";

			$stmt = $this->connection->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function getProduct($id) {
			$sql = "SELECT * FROM products WHERE id = :id";

			$stmt = $this->connection->prepare($sql);
			$stmt->bindParam('id',$id);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}

		function createProduct($product) {
			$sql = "INSERT INTO products (name, description, image_url, type, price) VALUES (:name, :description, :image_url, :type, :price)";
			$stmt = $this->connection->prepare($sql);

			$stmt->bindParam('name', $product['name']);
			$stmt->bindParam('description', $product['description']);
			$stmt->bindParam('image_url', $product['image_url']);
			$stmt->bindParam('type', $product['type']);
			$stmt->bindParam('price', $product['price']);

			$stmt->execute();

		}

		function getImages($product_id) {
			$sql = "SELECT * FROM images WHERE product_id = :product_id ORDER BY image_order";

			$stmt = $this->connection->prepare($sql);
			$stmt->bindParam('product_id',$product_id);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

		function createImage($image) {
			$sql = "INSERT INTO images (product_id, image_url, title, image_order) VALUES (:product_id, :image_url, :title, :image_order)";
			$stmt = $this->connection->prepare($sql);

			$stmt->bindParam('product_id', $image['product_id']);
			$stmt->bindParam('image_url', $image['image_url']);
			$stmt->bindParam('title', $image['title']);
			$stmt->bindParam('image_order', $image['image_order']);

			$stmt->execute();
			header("Location: new.php");
		}

		function getDetails($product_id) {
			$sql = "SELECT * FROM details WHERE product_id = :product_id";

			$stmt = $this->connection->prepare($sql);
			$stmt->bindParam('product_id',$product_id);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function createDetail($detail) {
			$sql = "INSERT INTO details (product_id, name, num) VALUES (:product_id, :name, :num)";
			$stmt = $this->connection->prepare($sql);

			$stmt->bindParam('product_id', $detail['product_id']);
			$stmt->bindParam('name', $detail['name']);
			$stmt->bindParam('num', $detail['num']);

			$stmt->execute();
			header("Location: new.php");
		}

		function createButton($button) {
			$sql = "INSERT INTO buttons (product_id, url) VALUES (:product_id, :url)";
			$stmt = $this->connection->prepare($sql);

			$stmt->bindParam('product_id', $button['product_id']);
			$stmt->bindParam('url', $button['url']);
			

			$stmt->execute();
			header("Location: new.php");
		}

		function getButton($product_id) {
			$sql = "SELECT * FROM buttons WHERE product_id = :product_id";
			$stmt = $this->connection->prepare($sql);
			$stmt->bindParam('product_id',$product_id);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}

?>