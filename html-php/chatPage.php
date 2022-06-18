<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ChatPage</title>
    <link rel="stylesheet" href="/myChatApp/css/chatPage.css" />
    <script src="https://kit.fontawesome.com/0334170ff8.js" crossorigin="anonymous"></script>
  </head>
  <?php
    session_start();
    $_SESSION['user_id'] = $_GET['user_id'];

  ?>
  
  <body>
    <section class="whole-page">
      <section class="header">
      
      
      <div class="logOut">
          <p>Log Out</p>
          <i class="fas fa-sign-out-alt"></i>
        </div>
      </section>
      <section class="chatSection">
        
        
      </section>
      <section class="typeMessage">
        <div class="chat-input">
          <form action="#">
            <input type="text" class="typingArea" name="text" placeholder="Type a message..." />
            <button type="submit" name="submit" value="submit" class="submit-msg-btn">
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </section>
    </section>

    <script src="/myChatApp/js/chatpage.js">

    </script>
    <script src="/myChatApp/js/sendMsg.js"></script>
  </body>
</html>
