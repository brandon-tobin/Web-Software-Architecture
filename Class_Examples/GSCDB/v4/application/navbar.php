

<?php

require_once "application.php"

if (verify_role('admin'))
  {
    echo "<a href='admin link'>";
  }

if (verify_role('applicant'))
  {
    echo "<a href='apply link'";
  }