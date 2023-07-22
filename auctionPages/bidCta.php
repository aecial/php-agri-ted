<?php
    $self = $_SERVER['PHP_SELF'];
    echo "<div class='row cta-row d-flex flex-column align-items-center mt-5'>
    <div class='input-group w-50 mb-2'>
    <form action='$self' method='post'>
      <span id='peso-sign' class='input-group-text'>₱</span>
      <input
        type='number'
        name='bidPrice'
        class='form-control text-center'
        id='inputPrice'
        onkeyup='al()'
      />
    </div>
    <button
      class='btn btn-success w-25'
      type='submit'
      name='submitLatest'
      onclick='lezgo()'
      id='bid-cta'
      disabled
    >
      Bid
    </button>
    </form>
  </div>";
?>