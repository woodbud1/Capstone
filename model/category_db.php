<?php
class Category_db {
    public static function getCategories() {
        $db = Database::getDB();
        $query = 'SELECT * FROM categories
                  ORDER BY categoryID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $categories = array();
        foreach ($statement as $row) {
            $category = new Category($row['categoryID'],
                                     $row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getCategory($category_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM categories
                  WHERE categoryID = :category_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();    
        $category = new Category($row['categoryID'],
                                 $row['categoryName']);
        return $category;
    }
    
    public static function add_category($category){
        $db = Database::getDB();
        
        $categoryName = $category->getName();
     
          $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
          $statement = $db->prepare($query);
          $statement->bindValue(':categoryName', $categoryName);
          $statement->execute();
          $statement->closeCursor();
        }
}
?>