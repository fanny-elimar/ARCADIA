<div class="comment border my-3">
  <p class="m-1"><?=htmlentities($review["re_review"]);?></p>
  <p class="m-1"><?= htmlentities($review["re_pseudo"]).' le '.date('d/m/y',strtotime(htmlentities($review["re_date"])))?></p>
</div>

