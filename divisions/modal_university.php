    <!-- Adding for Education Details -->
<div style="position: fixed;width: 100%;height: 100vh;background-color: #333333b3;z-index: 9999999;display: none;" id="addU">
	<div style="width: 590px;height: 350px;background-color: #f3f3f3;margin: 100px auto;border-radius: 5px;">

		<header style="width: 100%;display: flex;[position: relative;">
			<h3 style="padding: 20px;padding-top: -15px;">Educaton</h3>
			<i class="fas fa-times uClose" style="float: right;font-style: 30px;position: absolute;right: 0;margin: 15px;font-size: 26px;cursor: pointer;"></i>
		</header>
		<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 20px;">
			<label for="University" style="margin:5px 0px;">Program</label>
			<!-- <input type="text" name="University" id="school" placeholder="Ex: Negros Oriental State University" style="padding:5px;"> -->
			<select style="height: 30px;border: inset 0 0 6px rgba(0,0,0,0.3);" id="school">
					  <option value="">Program</option>
					  <option value="B.S. in Information Technology" <?php if($sch_name == 'B.S. in Information Technology'){echo 'selected';}?>>B.S. in Information Technology</option>
					  <option value="B.S. in Criminal Education">B.S. in Criminal Education</option>
					  <option value="B.S. in Business Administration">B.S. in Business Administration</option>
					  <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
					  <option value="Bachelor of Elementary Education">Bachelor of Elemenatary Education</option>
					  <option value="B.S. in Hotel Management">B.S. in Hotel Management</option>
			</select>
		</div>
		<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 5px;">
			<label for="University" style="margin:5px 0px;">Degree</label>
			<input type="text" name="University" id="degree" placeholder="Ex: Bachelors" value="" style="padding:5px;">
		</div>
	<!-- 	<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 5px;">
			<label for="University" style="margin:5px 0px;">Activities.</label>
			<input type="text" name="University" id="activities" placeholder="Add your School here..." style="padding:20px 5px;">
		</div> -->
		<div style="display: flex;flex-direction: row;width: calc( 100% - 40px );margin: 0 auto;padding-top: 5px;">
			<div style="display: flex;flex-direction: column;width: calc( 100% - 50px );margin: 5px;color: #333;">
				<label for="University" style="margin:5px 0px;">From Year:</label>
				<select style="height: 30px;border: 1px solid;" id="year">
					  <option value="">Year</option>
					  <option value="2019">2019</option>
					  <option value="2018">2018</option>
					  <option value="2017">2017</option>
					  <option value="2016">2016</option>
					  <option value="2015">2015</option>
					  <option value="2014">2014</option>
					  <option value="2013">2013</option>
					  <option value="2012">2012</option>
					  <option value="2011">2011</option>
					  <option value="2010">2010</option>
					  <option value="2009">2009</option>
					  <option value="2008">2008</option>
					  <option value="2007">2007</option>
					  <option value="2006">2006</option>
					  <option value="2005">2005</option>
					  <option value="2004">2004</option>
					  <option value="2003">2003</option>
					  <option value="2002">2002</option>
					  <option value="2001">2001</option>
					  <option value="2000">2000</option>
				</select>
			</div>
			<div style="display: flex;flex-direction: column;width: calc( 100% - 50px );margin: 5px auto;color: #333;">
				<label for="University" style="margin:5px 0px;">To Year:</label>
				<!-- <input type="text" name="University" placeholder="Ex: Bachelors" style="padding:5px;"> -->
				<select style="height: 30px;border: 1px solid;" id="to">  
				  <option value="">Year</option>
				  <option value="2026">2026</option>
				  <option value="2025">2025</option>
				  <option value="2024">2024</option>
				  <option value="2023">2023</option>
				  <option value="2022">2022</option>
				  <option value="2021">2021</option>
				  <option value="2020">2020</option>
				  <option value="2019">2019</option>
				  <option value="2018">2018</option>
				  <option value="2017">2017</option>
				  <option value="2016">2016</option>
				  <option value="2015">2015</option>
				  <option value="2014">2014</option>
				  <option value="2013">2013</option>
				  <option value="2012">2012</option>
				  <option value="2011">2011</option>
				  <option value="2010">2010</option>
				  <option value="2009">2009</option>
				  <option value="2008">2008</option>
				  <option value="2007">2007</option>
				  <option value="2006">2006</option>
				  <option value="2005">2005</option>
				  <option value="2004">2004</option>
				  <option value="2003">2003</option>
				  <option value="2002">2002</option>
				  <option value="2001">2001</option>
				  <option value="2000">2000</option>
				  <option value="1999">1999</option>
				</select>
			</div>			
		</div>
		<input type="hidden" id="sch_id">
		<button style="padding: 4px 17px;float: right;margin-right: 20px;margin-top: 20px;border-radius: 3px;background-color: #3c424d;border: none;color: #fff;font-size: 14px;font-weight: 600;cursor: pointer;display: none;" id="sub-btn-save" class="update">Update</button>
		<button style="padding: 4px 17px;float: right;margin-right: 20px;margin-top: 20px;border-radius: 3px;background-color: red;border: none;color: #fff;font-size: 14px;font-weight: 600;cursor: pointer;display: none;" id="sub-btn-save" class="remove">Remove</button>
		<button style="padding: 4px 17px;float: right;margin-right: 20px;margin-top: 20px;border-radius: 3px;background-color: #3c424d;border: none;color: #fff;font-size: 14px;font-weight: 600;cursor: pointer;" id="sub-btn-save" class="save">Save</button>
	</div>
</div>