<?php

$this->registerJsFile('/js/dropdown.js');
$this->registerCssFile('/css/styles.css');


$this->title = Yii::t('app', 'Calculator');

?>
<div class="container">
  <sd-app>Loading...</sd-app>
</div>
  <script>
  // Fixes undefined module function in SystemJS bundle
  function module() {}
  </script>

  <!-- shims:js -->
  <!-- endinject -->

  

  <!-- libs:js -->
  <!-- endinject -->

  <!-- inject:js -->
  <script src="/js/shims.js?1467445970416"></script>
  <script src="/js/app.js?1467445970418"></script>
  <!-- endinject -->

  

</body>
</html>
