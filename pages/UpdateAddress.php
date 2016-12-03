
 <?php //one thing I noticed:  "name" attributes on input tags must be unique - for example you can't have 2 tags with a name = "street" on the same page
 if(input::exists()){ //here is where we process the submitted form, if it exists
   $validate = new validate();
   $validation = $validate->check($_POST, array( //we can validate data here
    'mailing_street1' => array(
         'required' => true
         // 'min' => 2, //more examples, but you can mix and match these as needed per input
         // 'max' => 20
       ),
    'mailing_city' => array(
      'required'=> true),
    'mailing_postal' => array(
      'required'=> true),
    'mailing_email' => array(
      'required'=> true),
    'mailing_phone' => array(
      'required'=> true),
    'residential_street1' => array(
      'required'=> true),
    'residential_city' => array(
      'required'=> true),
    'residential_postal' => array(
      'required'=> true),
    'residential_phone' => array(
      'required'=> true),
    'emergency_first' => array(
      'required'=> true),
    'emergency_last' => array(
      'required'=> true),
    'emergency_relationship' => array(
      'required'=> true),
    'emergency_email' => array(
      'required'=> true),
    'emergency_phone' => array(
      'required'=> true),
    'other_first' => array(
      'required'=> true),
    'other_last' => array(
      'required'=> true),
    'other_relationship' => array(
      'required'=> true),
    'other_email' => array(
      'required'=> true),
    'other_phone' => array(
      'required'=> true),
    'local_first' => array(
      'required'=> true),
    'local_last' => array(
      'required'=> true),
    'local_relationship' => array(
      'required'=> true),
    'local_email' => array(
      'required'=> true),
    'local_phone' => array(
      'required'=> true)

   ));
   if($validation->passed()){//horay!  
     #echo "validation passed!";
     $fields = array();

     $fields['student_id'] = $user->data()->student_id;
     #echo $fields['student_id'];
     $fields['mailing_street1'] = input::get('mailing_street1');
     $fields['mailing_street2'] = input::get('mailing_street2');
     $fields['mailing_city'] = input::get('mailing_city');
     $fields['mailing_postal'] = input::get('mailing_postal');
     $fields['mailing_state'] = input::get('mailing_state');
     $fields['mailing_country'] = input::get('mailing_country');
     $fields['mailing_email'] = input::get('mailing_email');
     $fields['mailing_phone'] = input::get('mailing_phone');

     $fields['residential_street1'] = input::get('residential_street1');
     $fields['residential_street2'] = input::get('residential_street2');
     $fields['residential_building'] = input::get('residential_building');
     $fields['residential_city'] = input::get('residential_city');
     $fields['residential_postal'] = input::get('residential_postal');
     $fields['residential_state'] = input::get('residential_state');
     $fields['residential_country'] = input::get('residential_country'); 
     $fields['residential_phone'] = input::get('residential_phone');

     $fields['permanent_street1'] = input::get('permanent_street1');
     $fields['permanent_street2'] = input::get('permanent_street2');
     $fields['permanent_city'] = input::get('permanent_city');
     $fields['permanent_postal'] = input::get('permanent_postal');
     $fields['permanent_state'] = input::get('permanent_state');
     $fields['permanent_country'] = input::get('permanent_country');
     $fields['permanent_phone'] = input::get('permanent_phone');


     $fields['billing_street1'] = input::get('billing_street1');
     $fields['billing_street2'] = input::get('billing_street2');
     $fields['billing_city'] = input::get('billing_city');
     $fields['billing_postal'] = input::get('billing_postal');
     $fields['billing_state'] = input::get('billing_state');
     $fields['billing_country'] = input::get('billing_country');
     $fields['billing_phone'] = input::get('billing_phone');

     $fields['foreign_street1'] = input::get('foreign_street1');
     $fields['foreign_street2'] = input::get('foreign_street2');
     $fields['foreign_city'] = input::get('foreign_city');
     $fields['foreign_postal'] = input::get('foreign_postal');
     $fields['foreign_state'] = input::get('foreign_state');
     $fields['foreign_country'] = input::get('foreign_country');
     $fields['foreign_phone'] = input::get('foreign_phone');

     $fields['emergency_first'] = input::get('emergency_first');
     $fields['emergency_last'] = input::get('emergency_last');
     $fields['emergency_relationship'] = input::get('emergency_relationship');
     $fields['emergency_email'] = input::get('emergency_email');
     $fields['emergency_phone'] = input::get('emergency_phone');

     $fields['other_first'] = input::get('other_first');
     $fields['other_last'] = input::get('other_last');
     $fields['other_relationship'] = input::get('other_relationship');
     $fields['other_email'] = input::get('other_email');
     $fields['other_phone'] = input::get('other_phone');

     $fields['local_first'] = input::get('local_first');
     $fields['local_last'] = input::get('local_last');
     $fields['local_relationship'] = input::get('local_relationship');
     $fields['local_email'] = input::get('local_email');
     $fields['local_phone'] = input::get('local_phone');


   
     $test = DB::getInstance()->get("addresses", array('student_id', '=', "{$user->data()->student_id}")); //we need to see if this person already entered information
     if ($test->count()) { // they have
       #echo "updating info";
       DB::getInstance()->update("addresses", "{$user->data()->student_id}", "student_id", $fields);  
       //similar to below, but use -> set_data instead of ->insert
     } else {//they have not
       #echo "inserting info";
       #echo $fields['student_id'];
       DB::getInstance()->insert("addresses", $fields);  //'member to also submit the user id into the student_id field
     }
   } else {
     #echo "validation failed!";
   }
 }
 
 $data = DB::getInstance()->get("addresses", array('student_id', '=', "{$user->data()->student_id}")); //here is where we load any previously saved data from the database
   if($data->count()){
    #what does this mean? count of the array?
     $entry = $data->first(); //you can echo this member of this set anywhere on the page
     #$entry->data()->mailing_street1 something like this????
     #echo "We have data here";  
   } else {
     #echo "We have no data for this user"; 
   }
 ?>
  
  



<div class="col-md-12 homeLinks">
  <div class="row">
    <div class="col-md-5">
      <h1>Update Address</h1>
      <ul>
        <li>Fields marked with  *  must be filled in before submitting form. </li>
        <li>If any read-only fields are incorrect, please contact your school's Registrar.</li>
        <li>International Students: Address updates must be reported within 10 days of any change.  For more information on these requirements, please visit the <a href="#"= >International Services Office</a>.</li>
      </ul>
      <form method="post" action="#">

        <div id = "wrap">
          <div id = "left_col">

        <h2> Mailing Address </h2>
        <div class="form-group">
          <label for="street">Street1* </label>                                             
          <input type="text" class="form-control" name="mailing_street1" value= "<?php echo $entry->mailing_street1?>" placeholder="500 Joseph C. Wilson Blvd" required>
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="mailing_street2" value= "<?php echo $entry->mailing_street2?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City*</label>
          <input type="text" class="form-control" name="mailing_city" value= "<?php echo $entry->mailing_city?>" placeholder="Rochester" required>
          <label for="postal code">Postal Code*</label>
          <input type="text" class="form-control" name="mailing_postal" value= "<?php echo $entry->mailing_postal?>" placeholder="14627" required>
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="mailing_country" id="mailing_country" >

          </select>
 
        <script language = "javascript">
          populateCountries("mailing_country", "mailing_state");
        </script>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="mailing_state" id="mailing_state">
            <option value= "<?php echo $entry->mailing_state?>" >Select State</option>
          </select>
        </div>

   


        <div class="form-group">
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="mailing_email" value= "<?php echo $entry->mailing_email?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="mailing_phone" value= "<?php echo $entry->mailing_phone?>" placeholder="(###) ###-####" required>
        </div>
        <h2> Residential Address at the University of Rochester </h2>
        <div class="form-group">
          <label for="street">Street1* </label>
          <input type="text" class="form-control" name="residential_street1" value= "<?php echo $entry->residential_street1?>"  placeholder="500 Joseph C. Wilson Blvd" required>
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="residential_street2" value= "<?php echo $entry->residential_street2?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="building">Building</label>
          <input type="text" class="form-control" name="residential_building" value= "<?php echo $entry->residential_building?>"  placeholder="Riverview G">
        </div>
        <div class="form-group">
          <label for="city">City*</label>
          <input type="text" class="form-control" name="residential_city" value= "<?php echo $entry->residential_city?>" placeholder="Rochester" required>
          <label for=""postal code"">Postal Code*</label>
          <input type="text" class="form-control" name="residential_postal" value= "<?php echo $entry->residential_postal?>" placeholder="14627" required>
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="residential_country" id="residential_country">
            
          </select>
        <script language = "javascript">
          populateCountries("residential_country", "residential_state");
        </script>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="residential_state" id="residential_state">
            <option value= "<?php echo $entry->residential_state?>" >Select State</option>
          </select>
        </div>




        <div class="form-group">
          <label for="tel">Preferred Phone*</label>
          <input type="tel" class="form-control" name="residential_phone" value= "<?php echo $entry->residential_phone?>" placeholder="(###) ###-####" required>
        </div>

<!-- 
        <div>
          <input type = "checkbox" name = "mailing2permanent" value = true> Check here if your permanent address is the same as mailing address.<br>
        </div>
 -->
        <h2> Permanent Address</h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="permanent_street1" value= "<?php echo $entry->permanent_street1?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="permanent_street2" value= "<?php echo $entry->permanent_street2?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="permanent_city" value= "<?php echo $entry->permanent_city?>" placeholder="Rochester">
          <label for=""postal code"">Postal Code</label>
          <input type="text" class="form-control" name="permanent_postal" value= "<?php echo $entry->permanent_postal?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="permanent_country" id="permanent_country">
            
          </select>
        <script language = "javascript">
          populateCountries("permanent_country", "permanent_state");
        </script>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="permanent_state" id="permanent_state">
            <option value= "<?php echo $entry->permanent_state?>" >Select State</option>
          </select>
        </div>


        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="permanent_phone" value= "<?php echo $entry->permanent_phone?>" placeholder="(###) ###-####">
        </div>
        <h2> Billing Address</h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="billing_street1" value= "<?php echo $entry->billing_street1?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="billing_street2" value= "<?php echo $entry->billing_street2?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="billing_city" value= "<?php echo $entry->billing_city?>" placeholder="Rochester">
          <label for="postal code">Postal Code</label>
          <input type="text" class="form-control" name="billing_postal" value= "<?php echo $entry->billing_postal?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="billing_country" id="billing_country">
            
          </select>
        <script language = "javascript">
          populateCountries("billing_country", "billing_state");
        </script>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="billing_state" id="billing_state">
            <option value= "<?php echo $entry->billing_state?>" >Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="billing_phone" value= "<?php echo $entry->billing_phone?>" placeholder="(###) ###-####">
        </div>

        </div>


        <div id = "right_col">

        <h2> Foreign Address </h2>
        <div class="form-group">
          <label for="street">Street1</label>
          <input type="text" class="form-control" name="foreign_street1" value= "<?php echo $entry->foreign_street1?>" placeholder="500 Joseph C. Wilson Blvd">
        </div>
        <div class="form-group">
          <label for="street">Street2</label>
          <input type="text" class="form-control" name="foreign_street2" value= "<?php echo $entry->foreign_street2?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="foreign_city" value= "<?php echo $entry->foreign_city?>" placeholder="Rochester">
          <label for="postal code">Postal Code</label>
          <input type="text" class="form-control" name="foreign_postal" value= "<?php echo $entry->foreign_postal?>" placeholder="14627">
        </div>

        <div class="form-group">
          <label for = "country">Country</label>
          <select name="foreign_country" id="foreign_country">
            
          </select>
        <script language = "javascript">
          populateCountries("foreign_country", "foreign_state");
        </script>
        </div>

        <div class="form-group">
          <label for = "state">State</label>
          <select name="foreign_state" id="foreign_state">
            <option value= "<?php echo $entry->foreign_state?>" >Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tel">Phone</label>
          <input type="tel" class="form-control" name="foreign_phone" value= "<?php echo $entry->foreign_phone?>" placeholder="(###) ###-####">
        </div>

 
        <h2>Emergency Contact Information</h2>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="emergency_first" value= "<?php echo $entry->emergency_first?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="emergency_last" value= "<?php echo $entry->emergency_last?>" placeholder="Doe" required>
        </div>
        <div class="form-group">
          <label for="relationship">Relationship*</label>
          <select name="emergency_relationship" required>
    
            <option value="" disabled selected>Please select one</option>
            <option value ="foreign mission staff" <?php if ($entry->emergency_relationship=="foreign mission staff") echo 'selected="selected"'?> >Foreign Mission Staff</option>
            <option value="son or daughtor" <?php if ($entry->emergency_relationship=="son or daughtor") echo 'selected="selected"'?>>Son or Daughtor</option>
            <option value="spouse"<?php if ($entry->emergency_relationship=="spouse") echo 'selected="selected"'?>>Spouse</option>
            <option value="relative"<?php if ($entry->emergency_relationship=="relative") echo 'selected="selected"'?>>Relative</option>
            <option value="parent"<?php if ($entry->emergency_relationship=="parent") echo 'selected="selected"'?>>Parent</option>
            <option value="significant other"<?php if ($entry->emergency_relationship=="significant other") echo 'selected="selected"'?>>Significant Other</option>
            <option value="grandparent"<?php if ($entry->emergency_relationship=="grandparent") echo 'selected="selected"'?>>Grandparent</option>
            <option value="major superior"<?php if ($entry->emergency_relationship=="major superior") echo 'selected="selected"'?>>Major Superior</option>
            <option value="brother or sister"<?php if ($entry->emergency_relationship=="brother or sister") echo 'selected="selected"'?>>Brother or Sister</option>
            <option value="legal guardian"<?php if ($entry->emergency_relationship=="legal guardian") echo 'selected="selected"'?>>Legal Guardian</option>
            <option value="friend"<?php if ($entry->emergency_relationship=="friend") echo 'selected="selected"'?>>Friend</option>

          </select>
        </div>
        <div>

          <label for="email">Email*</label>
          <input type="email" class="form-control" name="emergency_email" value= "<?php echo $entry->emergency_email?>"  placeholder="jane@u.rochester.edu" required>
        </div>


        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="emergency_phone" value= "<?php echo $entry->emergency_phone?>"  placeholder="(###) ###-####" required>
        </div>
        <h2> Other Contacts</h2>
        <h3> Parent/Guardian/Family Member </h3>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="other_first" value= "<?php echo $entry->other_first?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="other_last" value= "<?php echo $entry->other_last?>" placeholder="Doe" required>
        </div>
        <div class="form-group">

          <label for="relationship">Relationship*</label>
          <select name="other_relationship" required>

            <option value="" disabled selected>Please select one</option>
            <option value="son or daughtor" <?php if ($entry->other_relationship=="son or daughtor") echo 'selected="selected"'?>>Son or Daughtor</option>
            <option value="spouse"<?php if ($entry->other_relationship=="spouse") echo 'selected="selected"'?>>Spouse</option>
            <option value="relative"<?php if ($entry->other_relationship=="relative") echo 'selected="selected"'?>>Relative</option>
            <option value="parent"<?php if ($entry->other_relationship=="parent") echo 'selected="selected"'?>>Parent</option>
            <option value="significant other"<?php if ($entry->other_relationship=="significant other") echo 'selected="selected"'?>>Significant Other</option>
            <option value="grandparent"<?php if ($entry->other_relationship=="grandparent") echo 'selected="selected"'?>>Grandparent</option>
            <option value="brother or sister"<?php if ($entry->other_relationship=="brother or sister") echo 'selected="selected"'?>>Brother or Sister</option>
            <option value="legal guardian"<?php if ($entry->other_relationship=="legal guardian") echo 'selected="selected"'?>>Legal Guardian</option>


          </select>

        </div>
        <div>
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="other_email" value= "<?php echo $entry->other_email?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="other_phone" value= "<?php echo $entry->other_phone?>" placeholder="(###) ###-####" required>
        </div>
        <h3> Local Contact </h3>
        <div class="form-group">
          <label for="first name">First Name*</label>
          <input type="text" class="form-control" name="local_first" value= "<?php echo $entry->local_first?>" placeholder="Jane" required>
          <label for="last name">Last Name*</label>
          <input type="text" class="form-control" name="local_last" value= "<?php echo $entry->local_last?>" placeholder="Doe" required>
        </div>
        <div class="form-group">
        <label for="relationship">Relationship*</label>
          <select name="local_relationship" required>
            <option value="" disabled selected>Please select one</option>
            <option value ="foreign mission staff" <?php if ($entry->local_relationship=="foreign mission staff") echo 'selected="selected"'?> >Foreign Mission Staff</option>
            <option value="son or daughtor" <?php if ($entry->local_relationship=="son or daughtor") echo 'selected="selected"'?>>Son or Daughtor</option>
            <option value="spouse"<?php if ($entry->local_relationship=="spouse") echo 'selected="selected"'?>>Spouse</option>
            <option value="relative"<?php if ($entry->local_relationship=="relative") echo 'selected="selected"'?>>Relative</option>
            <option value="parent"<?php if ($entry->local_relationship=="parent") echo 'selected="selected"'?>>Parent</option>
            <option value="significant other"<?php if ($entry->local_relationship=="significant other") echo 'selected="selected"'?>>Significant Other</option>
            <option value="grandparent"<?php if ($entry->local_relationship=="grandparent") echo 'selected="selected"'?>>Grandparent</option>
            <option value="major superior"<?php if ($entry->local_relationship=="major superior") echo 'selected="selected"'?>>Major Superior</option>
            <option value="brother or sister"<?php if ($entry->local_relationship=="brother or sister") echo 'selected="selected"'?>>Brother or Sister</option>
            <option value="legal guardian"<?php if ($entry->local_relationship=="legal guardian") echo 'selected="selected"'?>>Legal Guardian</option>
            <option value="friend"<?php if ($entry->elocal_relationship=="friend") echo 'selected="selected"'?>>Friend</option>

          </select>
        </div>
        <div>
          <label for="email">Email*</label>
          <input type="email" class="form-control" name="local_email" value= "<?php echo $entry->local_email?>" placeholder="jane@u.rochester.edu" required>
        </div>
        <div class="form-group">
          <label for="tel">Phone*</label>
          <input type="tel" class="form-control" name="local_phone" value= "<?php echo $entry->local_phone?>" placeholder="(###) ###-####" required>
        </div>

        </div>
      </div>

        <button type="submit" name="send-form" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</div> 