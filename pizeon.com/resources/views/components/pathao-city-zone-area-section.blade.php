<div class="row mb-3">
    <div class="col-md-4">
      <label for="recipient_city" class="form-label">City:</label>
      <select class="form-control form-select" onchange="selectCity()" required id="recipient_city" name="recipient_city">
        <option value="">-- Select City --</option>
        @foreach($cities->data as $city)
            <option value="{{ $city->city_id ?? '' }}">{{ $city->city_name ?? '' }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label for="recipient_zone" class="form-label">Zone:</label>
      <select class="form-control form-select" onchange="selectZone()" required id="recipient_zone" name="recipient_zone">
        <option value="">-- Select Zone --</option>
      </select>
  </div>

  <div class="col-md-4">
      <label for="recipient_area" class="form-label">Area:</label>
      <select class="form-control form-select" onchange="selectArea()" required id="recipient_area" name="recipient_area">
        <option value="">-- Select area --</option>
      </select>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    function selectCity() {
        let city = $('#recipient_city').val();
        $('#city_text').val($('#recipient_city').find('option:selected').text());

        $('#recipient_area').html('<option value="">-- Select Area --</option>');
        if(city == ''){
            $('#recipient_zone').html('<option value="">-- Select City First --</option>');
            return;
        }
        $.ajax({
          type: 'get',
          url: "{{route('order.pathao.city.to.zone')}}",
          data: {
              'city': city,
          },
          beforeSend: function() {
              $('#recipient_zone').html('<option value="">Zone  Loading...</option>');
          },
          success: function (data) {
              $('#recipient_zone').html(data);
          }
      });
    }

    function selectZone() {
        let zone = $('#recipient_zone').val();
        $('#zone_text').val($('#recipient_zone').find('option:selected').text());
        
        if(zone == ''){
            $('#recipient_area').html('<option value="">-- Select Zone First --</option>');
            return;
        }
        $.ajax({
          type: 'get',
          url: "{{route('order.pathao.zone.to.area')}}",
          data: {
              'zone': zone,
          },
          beforeSend: function() {
              $('#recipient_area').html('<option value="">Area  Loading...</option>');
          },
          success: function (data) {
              $('#recipient_area').html(data);
          }
      });
    }

    function selectArea() {
      $('#area_text').val($('#recipient_area').find('option:selected').text());
    }

  </script>
</div>
