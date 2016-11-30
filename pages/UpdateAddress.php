


<div class="col-md-12 homeLinks">
  <div class="row">
    <div class="col-md-5">
      <h1>Update Address</h1>
      <ul>
        <li>Fields marked with  *  must be filled in before submitting form. </li>
        <li>If any read-only fields are incorrect, please contact your school's Registrar.</li>
        <li>International Students: Address updates must be reported within 10 days of any change.  For more information on these requirements, please visit the <a href="#"= >International Services Office</a>.</li>
      </ul>
      <form method="post" action="#" >

        <div id = "wrap">
          <div id = "left_col">

        <h2> Mailing Address </h2>
        <div class="form-group">
          <label for="street">Street1* </label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->mailing_street1)?>" placeholder="500 Joseph C. Wilson Blvd" required>
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->mailing_street2)?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City*</label>
          <input type="text" class="form-control" name="city" value= "<?php echo ($user->data()->mailing_city)?>" placeholder="Rochester" required>
          <label for="postal code">Postal Code*</label>
          <input type="text" class="form-control" name="postal code" value= "<?php echo ($user->data()->mailing_postal)?>" placeholder="14627" required>
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="country" class="countries" id="countryId">
            <option value= "<?php echo ($user->data()->mailing_country)?>" >Select Country</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="state" class="states" id="stateId">
            <option value= "<?php echo ($user->data()->mailing_state)?>" >Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="email" value= "<?php echo ($user->data()->mailing_mail)?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->mailing_phone)?>" placeholder="(###) ###-####" required>
        </div>
        <h2> Residential Address at the University of Rochester </h2>
        <div class="form-group">
          <label for="street">Street1* </label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->residential_street1)?>"  placeholder="500 Joseph C. Wilson Blvd" required>
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->residential_street2)?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="building">Building</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->residential_building)?>"  placeholder="Riverview G">
        </div>
        <div class="form-group">
          <label for="city">City*</label>
          <input type="text" class="form-control" name="city" value= "<?php echo ($user->data()->residential_city)?>" placeholder="Rochester" required>
          <label for=""postal code"">Postal Code*</label>
          <input type="text" class="form-control" name="postal code" value= "<?php echo ($user->data()->residential_postal)?>" placeholder="14627" required>
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="country" class="countries" id="countryId">
            <option value="">Select Country</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="state" class="states" id="stateId">
            <option value="">Select State</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tel">Preferred Phone*</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->residential_phone)?>" placeholder="(###) ###-####" required>
        </div>
        <h2> Permanent Address</h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->permanent_street1)?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->permanent_street2)?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" value= "<?php echo ($user->data()->permanent_city)?>" placeholder="Rochester">
          <label for=""postal code"">Postal Code</label>
          <input type="text" class="form-control" name="postal code" value= "<?php echo ($user->data()->permanent_postal)?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="country" class="countries" id="countryId">
            <option value="">Select Country</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="state" class="states" id="stateId">
            <option value="">Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->permanent_phone)?>" placeholder="(###) ###-####">
        </div>
        <h2> Billing Address</h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->billing_street1)?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->billing_street2)?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" value= "<?php echo ($user->data()->billing_city)?>" placeholder="Rochester">
          <label for="postal code">Postal Code</label>
          <input type="text" class="form-control" name="postal code" value= "<?php echo ($user->data()->billing_postal)?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="country" class="countries" id="countryId">
            <option value="">Select Country</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="state" class="states" id="stateId">
            <option value="">Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->billing_phone)?>" placeholder="(###) ###-####">
        </div>

        </div>


        <div id = "right_col">

        <h2> Foreign Address </h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->foreign_street1)?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="street" value= "<?php echo ($user->data()->foreign_street2)?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" value= "<?php echo ($user->data()->foreign_city)?>" placeholder="Rochester">
          <label for="postal code">Postal Code</label>
          <input type="text" class="form-control" name="postal code" value= "<?php echo ($user->data()->foreign_postal)?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="country" class="countries" id="countryId">
            <option value="">Select Country</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="state" class="states" id="stateId">
            <option value="">Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->foreign_phone)?>" placeholder="(###) ###-####">
        </div>

 
        <h2>Emergency Contact Information</h2>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="first name" value= "<?php echo ($user->data()->emergency_first)?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="last name" value= "<?php echo ($user->data()->emergency_last)?>" placeholder="Doe" required>
        </div>
        <div class="form-group">
          <label for="relationship">Relationship*</label>
          <select name="relationship" required>
            <option value="" disabled selected>Please select one</option>
            <option value="foreign mission staff">Foreign Mission Staff</option>
            <option value="son or daughtor">Son or Daughtor</option>
            <option value="spouse">Spouse</option>
            <option value="relative">Relative</option>
            <option value="parent">Parent</option>
            <option value="significant other">Significant Other</option>
            <option value="grandparent">Grandparent</option>
            <option value="major superior">Major Superior</option>
            <option value="brother or sister">Brother or Sister</option>
            <option value="legal guardian">Legal Guardian</option>
            <option value="friend">Friend</option>

          </select>
        </div>
        <div>

          <label for="email">Email*</label>
          <input type="email" class="form-control" name="email" value= "<?php echo ($user->data()->emergency_email)?>"  placeholder="jane@u.rochester.edu" required>
        </div>


        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->emergency_phone)?>"  placeholder="(###) ###-####" required>
        </div>
        <h2> Other Contacts</h2>
        <h3> Parent/Guardian/Family Member </h3>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="first name" value= "<?php echo ($user->data()->other_first)?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="last name" value= "<?php echo ($user->data()->other_last)?>" placeholder="Doe" required>
        </div>
        <div class="form-group">

          <label for="relationship">Relationship*</label>
          <select name="relationship" required>
            <option value="" disabled selected>Please select one</option>
            <option value="son or daughtor">Son or Daughtor</option>
            <option value="spouse">Spouse</option>
            <option value="relative">Relative</option>
            <option value="parent">Parent</option>
            <option value="significant other">Significant Other</option>
            <option value="grandparent">Grandparent</option>
            <option value="brother or sister">Brother or Sister</option>
            <option value="legal guardian">Legal Guardian</option>

          </select>

        </div>
        <div>
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="email" value= "<?php echo ($user->data()->other_email)?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->other_phone)?>" placeholder="(###) ###-####" required>
        </div>
        <h3> Local Contact </h3>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="first name" value= "<?php echo ($user->data()->local_first)?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="last name" value= "<?php echo ($user->data()->local_last)?>" placeholder="Doe" required>
        </div>
        <div class="form-group">
        <label for="relationship">Relationship*</label>
          <select name="relationship" required>
            <option value="" disabled selected>Please select one</option>
            <option value="foreign mission staff">Foreign Mission Staff</option>
            <option value="son or daughtor">Son or Daughtor</option>
            <option value="spouse">Spouse</option>
            <option value="relative">Relative</option>
            <option value="parent">Parent</option>
            <option value="significant other">Significant Other</option>
            <option value="grandparent">Grandparent</option>
            <option value="major superior">Major Superior</option>
            <option value="brother or sister">Brother or Sister</option>
            <option value="legal guardian">Legal Guardian</option>
            <option value="friend">Friend</option>
          </select>
        </div>
        <div>
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="email" value= "<?php echo ($user->data()->local_email)?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="phone" value= "<?php echo ($user->data()->local_phone)?>" placeholder="(###) ###-####" required>
        </div>

        </div>
      </div>

        <button type="submit" name="send-form" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</div> 