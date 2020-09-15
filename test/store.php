<?php include_once 'header.php'; ?>
</div>
</div>


<style>
*:before, *:after {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
  }
  
  
  
  .accordion a {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    padding: 1rem 1rem 1rem 1rem;
    color: #444;
    font-size: 1.15rem;
    font-weight: 400;
    border-bottom: 1px solid #000;
    text-decoration: none;
  }
  
  .accordion a:hover,
  .accordion a:hover::after {
    cursor: pointer;
    color: #0a7e07;
  }
  
  .accordion a:hover::after {
    border: 1px solid #0a7e07;
  }
  
  .accordion a.active {
    color: #0a7e07;
    border-bottom: 1px solid #0a7e07;
  }
  

  
  .accordion .content {
    opacity: 0;
    padding: 0 1rem;
    max-height: 0;
    border-bottom: 1px solid #e5e5e5;
    overflow: hidden;
    clear: both;
  }
  
  .accordion .content p {
    font-size: 1rem;
    font-weight: 400;
    color: #444;
  }
  
  .accordion .content.active {
    opacity: 1;
    padding: 1rem;
    max-height: 100%;
    background-color: white;
  }
</style>

<div id="main-wrapper">
	<div class="container">
        <header class="major" style="margin-bottom: 1.5em;">
            <h2>Disc.Market Merch Store</h2>
        </header>

    </div>
</div>


<?php include_once 'footer.php'; ?>

<script>
const items = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  $(this).find('i').toggleClass('fa-plus-circle fa-minus-circle');
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>

