
<!-- Adding for Work Information Details -->
<div style="position: fixed;width: 100%;height: 100vh;background-color: #333333b3;z-index: 9999999;display: none;" id="addW">
	<div style="width: 590px;height: 545px;background-color: #f3f3f3;margin: 60px auto;border-radius: 5px;">
		<header style="width: 100%;display: flex;">
			<h3 style="padding: 20px;padding-top: -15px;">Employment Details</h3>
			<i class="fas fa-times wClose" style="float: right;font-style: 30px;position: absolute;right: 0;margin: 15px;font-size: 26px;cursor: pointer;"></i>
		</header>
		<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 20px;">
			<label for="University" style="margin:5px 0px;">Title</label>
			<input type="text" name="University" placeholder="Ex: Senior Manager" style="padding:5px;" id="job-title">
		</div>
		<div style="display: flex;flex-direction: column;margin: 0 auto;padding-top: 5px;margin-left: 0px;">
			<div style="display: flex;flex-direction: column;width: calc( 100% - 50px );margin: 5px auto;color: #333;">
				<label for="University" style="margin:5px 0px;">Is this posisiton related to your field?</label>
				<select style="height: 30px;border: 1px solid;width: 15%;border: 1px solid #999;border-radius: 3px;" id="job_relation">
				  <option value="1">Yes</option>
				  <option value="0">No</option>
				</select>
			</div>
		</div>
		<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 5px;">
			<label for="University" style="margin:5px 0px;">Company</label>
			<input type="text" name="University" placeholder="Ex: Dell" style="padding:5px;" id="company">
		</div>
		<div style="display: flex;flex-direction: column;width: calc( 100% - 40px );margin: 5px auto;color: #333;padding-top: 5px;">
			<label for="University" style="margin:5px 0px;">Location.</label>
			<input type="text" name="University" placeholder="Cotabato Philippines" style="padding:8px 5px;" id="location">
		</div>
		<div style="display: flex;flex-direction: column;width: 30%;margin: 0 auto;padding-top: 5px;margin-left: 0px;">
			<div style="display: flex;flex-direction: column;width: calc( 100% - 50px );margin: 5px auto;color: #333;">
				<label for="University" style="margin:5px 0px;">From</label>
				<select style="height: 30px;border: 1px solid;" id="month">
				  <option value="">Month</option>
				  <option value="January">January</option>
				  <option value="February">February</option>
				  <option value="March">March</option>
				  <option value="April">April</option>
				  <option value="May">May</option>
				  <option value="June">June</option>
				  <option value="July">July</option>
				  <option value="August">August</option>
				  <option value="September">September</option>
				  <option value="October">October</option>
				  <option value="November">November</option>
				  <option value="December">December</option>
				</select>
			</div>
			<div style="display: flex;flex-direction: column;width: calc( 100% - 50px );margin: 5px auto;color: #333;">
				<label for="University" style="margin:5px 0px;"></label>
				<!-- <input type="text" name="University" placeholder="Ex: Bachelors" style="padding:5px;"> -->
				<select style="height: 30px;border: 1px solid;" id="yearStart">  
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
		<button style="padding: 4px 17px;float: right;margin-right: 20px;margin-top: 20px;border-radius: 3px;background-color: #3c424d;border: none;color: #fff;font-size: 14px;font-weight: 600;cursor: pointer;" id="mploymentBtnSave">Save</button>
	</div>
</div>