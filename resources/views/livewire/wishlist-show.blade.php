<div>
    <div class="container py-5">
    <h1 class="text-center mb-5">My Wishlist</h1>

    <div class="row fw-bold border-bottom pb-2 mb-3">
      <div class="col-md-4">Product</div>
      <div class="col-md-2">Price</div>
      <!-- <div class="col-md-3">Quantity</div> -->
      <div class="col-md-3">Action</div>
    </div>

    <!-- Wishlist Item Row (styled as card row) -->
    <div class="card shadow-sm mb-3">
      <div class="card-body">
            <div class="row align-items-center">
              
                    <div class="col-md-4">
                        <img src="" alt="pump" class="mb-3">
                        <h5 class="mb-3">Pump</h5>
                        <p class="text-muted mb-0"> Quality Pumps with reasonable price</p>
                    </div>
                    <div class="col-md-2">
                        <p class="mb-0"> ₹2000</p>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="input-group input-group-sm" style="width: 120px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, -1)">-</button>
                        <input type="text" class="form-control text-center" value="1" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, 1)">+</button>
                    </div> -->
                    <div class="col-md-3">
                        <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <!-- Another Wishlist Item -->
    <!-- <div class="card shadow-sm mb-3">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-md-4">
            <img src="" alt="generator" class="mb-3">
            <h5 class="mb-3">Genarator</h5>
            <p class="text-muted mb-3">High Quality Pumps with reasonable price</p>
          </div>
          <div class="col-md-2">
            <p class="mb-0"> ₹3000</p>
          </div>
          <div class="col-md-3">
            <div class="input-group input-group-sm" style="width: 120px;">
              <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, -1)">-</button>
              <input type="text" class="form-control text-center" value="1" readonly>
              <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, 1)">+</button>
            </div>
          </div>
          <div class="col-md-3">
            <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
          </div>
        </div>
      </div>
    </div>

  </div> -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Quantity + Remove Scripts -->
  <script>
    function removeItem(button) {
      const card = button.closest('.card');
      card.remove();
    }

    function changeQuantity(button, change) {
      const input = button.parentElement.querySelector('input');
      let value = parseInt(input.value);
      value += change;
      if (value < 1) value = 1;
      input.value = value;
    }
  </script>

  <!--================= Stylish ================= -->

  
</div>
