<?PHP


function dayOfWeek()
{
  $dow = date("w");
  switch($dow){
    case 0 : echo "niedziela";break;
    case 1 : echo "poniedziałek";break;
    case 2 : echo "wtorek";break;
    case 3 : echo "środa";break;
    case 4 : echo "czwartek";break;
    case 5 : echo "piątek";break;
    case 6 : echo "sobota";break;
    default : echo "nieznany dzień tygodnia :)";
  }
}
?>