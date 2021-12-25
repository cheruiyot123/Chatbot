<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="build/botui.min.css">
  <link rel="stylesheet" href="build/botui-theme-default.css">
</head>
<body>
  <div class="botui-app-container" id="hello-world">
    <bot-ui></bot-ui>
  </div>
  <script src="build/vue.min.js"></script>
  <script src="build/botui.js"></script>
  <script>
    //var botui = new BotUI('botui-app')
    var botui = new BotUI('hello-world');
    botui.message.bot({ // show first message
  delay: 200,
  content: 'Hello'
}).then(() => {
  return botui.message.bot({ // second one
    delay: 2000, // wait 1 sec.
    content: 'how are you?'
  })
}).then(() => {
  return botui.action.button({ // let user do something
    delay: 1000,
    action: [
      {
        text: 'Good',
        value: 'good'
      },
      {
        text: 'Really Good',
        value: 'really_good'
      }
    ]
  })
}).then(res => {
  return botui.message.bot({
    delay: 2000,
    loading: true,
    content: `You are feeling ${res.text}!`
  })
}).then(() => {
  return botui.message.bot({ // second one
    delay: 2000, // wait 1 sec.
    content: 'how can i help you?'
  })
}).then(() => {
  return botui.action.text({ // let user do something
    delay: 1000,
    action: 
      {
        placeholder: 'Enter your question'
      }  
  })
}).then(res => {
  return botui.message.bot({
    delay: 2000,
    loading: true,
    content: `You are feeling ${res.value}!`
    
  })

  var res_id =$(res.value)
  $.post('botui.php',{res_id:res_id});
})
    
  </script>
  <?php $_SESSION['res_id'] ='<script>document.write(res_id)</script>';
  echo $_SESSION['res_id'];?>
</div>
</body>
</html>