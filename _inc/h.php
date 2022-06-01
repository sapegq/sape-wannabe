try {
$stmt = $db->prepare(
    "INSERT INTO messages (username, signup, password) 
      VALUES (:username, :signup, :password)"
  );
  
  // Bind values directly to statement variables
  $stmt->bindValue(':username', 'message title', SQLITE3_TEXT);
  $stmt->bindValue(':bio', 'message body', SQLITE3_TEXT);
  
  // Format unix time to timestamp
  $formatted_time = date(DATE_ATOM);
  $stmt->bindValue(':signup', $formatted_time, SQLITE3_TEXT);
   
  // Execute statement
  $stmt->execute();
  
  $messages = $db->query("SELECT * FROM messages");
    
  // Garbage collect db
  $db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}