<?php

/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blockname-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blockname';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<!-- Required - Controls the No Backup Checkbox toggle -->
<script>
        jQuery(document).ready(function () {
            jQuery("#nobackup").click(function () {
                jQuery("#nobackuptime").toggleClass("disable");
                jQuery(".nobk").toggleClass("disable");

            });
        });
    </script> 


<!-- START OF RTO -->
<div id="calculator">

    <section class="col-12 top">
       
        
        <p id="instruction">INPUT YOUR SPECIFIC NEEDS IN THE FIELDS BELOW TO RECEIVE THE MOST ACCURATE RESULTS. HOVER OVER
            THE QUESTION MARKS FOR MORE INFORMATION.</p>
        <h2>Recovery & Data Storage</h2>
        <div class="inputfield col-md-12 col-sm-12">
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">In order to give <span v-if="mspcheck == 'msp'">your clients</span>
                    <span v-else>you</span> a correct calculation we need to get an idea of how much data you have in
                    <span v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> systems across
                    <span v-if="mspcheck == 'msp'">their</span><span v-else>your</span> organization.</span>
            </div>
            <h6 class="col-md-6">How much data do <span v-if="mspcheck == 'msp'">your clients / </span><span
                    v-else>you</span> store on critical business systems?</h6>
            <div class="col-md-5 col-sm-12">
                <p class="pretag"></p>
                <input type="number" min="1" v-model="datagb"/>
                <p class="posttag">GB</p>
            </div>
        </div>
        <div class="inputfield col-md-12 col-sm-12 dualfield">
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">What is the timeframe between each of
                    <span v-if="mspcheck == 'msp'">your clients'</span>
                    <span v-else>your</span> backups? E.g. every hour, once a day, once a week.</span>
            </div>
            <h6 class="col-md-6">How often do you back up this data?</h6>
            <div class="col-md-5 col-sm-12" id="nobackuptime">
                <div class="dual">
                    <label>Hours</label><label>Mins</label> <input type="number" min="0" v-model.number="backuphrs"/>
                    <input type="number" min="0" v-model.number="backupmins"/>
                </div>


            </div>
            <h6 class="col-md-6" style="margin-left: 40px;"></h6>
            <div class="col-md-5 col-sm-12 nobkframe">
                <input v-model="checked" id="nobackup" type="checkbox" style="margin: 0px;
    width: 16px;
    float: left;"> <label style="width: auto;
    padding: 0;
    padding-left: 10px;" for="nobackup"><span v-if="mspcheck == 'msp'">We</span><span v-else>I</span> currently don't
                back up <span v-if="mspcheck == 'msp'">their</span><span v-else>my</span> data</label></div>

        </div>
        <div class="inputfield col-md-12 col-sm-12 nobk dualfield"> 
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">From when disaster strikes, how long does it for your end user to notify you, for you to assess the situation, access your backups, and start the recovery process? Think of this a your reponse time.</span>
            </div>
            <h6 class="col-md-6">
				<span v-if="mspcheck == 'msp'">On average, how long does it take your client to notify you of an issue and for you to
                start troubleshooting it?</span> <span v-else>On average, how long does it take you to notify your IT service provider that there is an issue and for them to
                start troubleshooting the it?</span>
            </h6>
            <div class="col-md-5 col-sm-12">
                <div class="dual">
                    <label>Hours</label><label>Mins</label> <input type="number" min="0" v-model.number="recoveryhrs"/>
                    <input type="number" min="0" v-model.number="recoverymins"/>
                </div>
            </div>
        </div>
        <div class="inputfield col-md-12 col-sm-12 nobk">
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">Storing your data locally is designed for fast data transfers, however you are at risk if there is a disaster in the office such as fire, floods or theft. Cloud data is stored off-site, such as in a Datto data center, which brings an extra level of availability albeit at a slower speed for full bare metal restores.
</span>
            </div>
            <h6 class="col-md-6"><span
                    v-if="mspcheck == 'msp'">Where are your clients backups currently stored? </span><span v-else>Where do you currently store your backups?</span>
            </h6>
            <div class="col-md-5 col-sm-12">
                <p class="pretag"></p>
                <div class="switch-field">
                    <input type="radio" id="radio-one" name="recoverytype" v-model="recoverytype" value="local"
                           checked/> <label for="radio-one">Locally</label> <input type="radio" id="radio-two"
                                                                                   name="recoverytype"
                                                                                   v-model="recoverytype"
                                                                                   value="cloud"/> <label
                        for="radio-two">In the Cloud</label> <input type="radio" id="radio-three" name="recoverytype"
                                                                    v-model="recoverytype" value="Both"/> <label
                        for="radio-three">Both</label>
                </div>
                <p class="posttag"></p>
            </div>
        </div>
        <div v-if="recoverytype !== 'local'" class="inputfield col-md-12 col-sm-12">
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">Speed of cloud recovery comes down to the amount of data you are trying to recover and your download speed. Devices with slower connections will take longer to recover.</span>
            </div>
            <h6 class="col-md-7">What is the download speed from <span v-if="mspcheck == 'msp'">their</span><span
                    v-else>your</span> cloud backup location? <br/><span>If you're unsure, <a class="link"
                                                                                    href="https://www.speedtest.net/"
                                                                                    target="_blank">run a test here.</a></span>
            </h6>
            <div class="col-md-4 col-sm-12">
                <p class="pretag"></p>
                <input type="number" name="cloudspeed" v-model.number="cloudspeed"/>
                <p class="posttag">Mbps</p>
            </div>
        </div>

    </section>
    <section class="col-12">
        <h2>Downtime & Recovery Costs</h2>
        <div class="inputfield col-md-12 col-sm-12">
            <div class="tooltip" onclick="return true">
                <p class="icon">?</p>
                <span class="tooltiptext">Nearly every employee will be impacted by an IT outage and will not be able to perform their job obligations to a certain degree. We recommend including the entire staff in this field.</span>
            </div>
            <h6 class="col-md-7">How many employees do <span v-if="mspcheck == 'msp'">they</span><span v-else>you</span>
                have?</h6>
            <div class="col-md-4 col-sm-12">
                <p class="pretag"></p>
                <input type="number" min="0" v-model="staff"/>
                <p class="posttag"></p>
            </div>
        </div>
        <div id="cost">
            <div class="inputfield col-md-12 col-sm-12">
                <div class="tooltip" onclick="return true">
                    <p class="icon">?</p>
                    <span class="tooltiptext">Even if the business stops due to an outage and employees are not able to perform some, or all, of their duties, employee wages typically are still paid. We are assuming yours will need to be paid, and this must be included in your cost of downtime calculations.</span>
                </div>
                <h6 class="col-md-7">What is their average annual salary?</h6>
                <div class="col-md-4 col-sm-12">
                    <p class="pretag">{{currencyicon}}</p>
                    <input type="number" v-model="staffwage"/>
                    <p class="posttag"></p>
                </div>
            </div>
            <div class="inputfield col-md-12 col-sm-12">
                <div class="tooltip" onclick="return true">
                    <p class="icon">?</p>
                    <span class="tooltiptext">All staff come with overhead costs like, gas, electric, rent, etc. Normally, this is about 50% of the average salary.</span>
                </div>
                <h6 class="col-md-7">What is their average annual overhead cost?</h6>
                <div class="col-md-4 col-sm-12">
                    <p class="pretag">{{currencyicon}}</p>
                    <input type="number" v-model="staffoverhead"/>
                    <p class="posttag"></p>
                </div>
            </div>
            <div class="inputfield col-md-12 col-sm-12">
                <div class="tooltip" onclick="return true">
                    <p class="icon">?</p>
                    <span class="tooltiptext">For most businesses, an outage will halt the ability to product and accrue revenue. We are assuming that your revenue will case during an outage, and so annual revenue helps to calculate the average cost of lost revenue during downtime.</span>
                </div>
                <h6 class="col-md-7">What is your <span v-if="mspcheck == 'msp'">clients'</span> business's annual
                    revenue?</h6>
                <div class="col-md-4 col-sm-12">
                    <p class="pretag">{{currencyicon}}</p>
                    <input type="number" v-model="staffrevenue"/>
                    <p class="posttag"></p>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12 bottom">
        <h2>Results</h2>
        <div id="numberresults">
            <div id="time" class="col-md-6 col-sm-12 PDFcurrent">
                <h4 id="currenttitle">Current Solution</h4>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">It's critical to regularly test your backups. In the case that a backup isn't working, you could be looking at additional losses of <strong>{{perbackupdowntime}}</strong> per failed backup.</span>
                    </div>
                    <div id="current1">
                        <div>
                            <p class="restitle">Time Between Backups </p>
                            <h6 v-if="checked == ''">{{backuphrs}}hrs {{backupmins}}mins</h6>
                            <h6 v-else-if="checked == 'false'">{{backuphrs}}hrs {{backupmins}}mins</h6>
                            <h6 v-else>No Backup Taken</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">This is the time it takes for your data to actually be downloaded back to your original device based on your backup location. Local backups will be quicker, but because a local disaster could take out local backups, but it’s always vital to ensure that you have a cloud backup as well.</span>
                    </div>
                    <div id="current2">
                        <div>
                            <p class="restitle">Recovery Processing Time</p>
                            <div v-if="checked == ''">
                                <h6 v-if="recoverytype === 'local'">
                                    {{localrecoveryDowntime}} </h6>
                                <h6 v-else>
                                    {{cloudrecoveryDowntime}} </h6>
                            </div>
                            <div v-else-if="checked == 'false'">
                                <h6 v-if="recoverytype === 'local'">{{localrecoveryDowntime}}</h6>
                                <h6 v-else>{{cloudrecoveryDowntime}}</h6>
                            </div>
                            <h6 v-else>No Backup Taken</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">If you experience a ransomware attack, you may be able to recover quickly.  If you're faced with a fire or flood, you could be offsite for days and face higher costs than what you see here.  <strong
                                v-if="recoverytype === 'local'">The results below are estimates for a local backup with a data transfer speed of around 500MB/s</strong> </span>
                    </div>
                    <div id="current3">
                        <div>

                            <div>
                                <p style="margin-bottom: 20px; border-bottom: 1px solid;" class="restitle">Summary</p>

                                <h6 v-if="checked == ''">
                                    Estimated Recovery Time & Loss:<br/> <strong v-if="recoverytype === 'local'"
                                                                                 style="color: #4d5967;">{{localrecoveryDowntime}} </strong>
                                    <strong v-else-if="recoverytype === 'cloud'" style="color: #4d5967;">{{cloudrecoveryDowntime}} </strong>
                                    <strong v-else style="color: #4d5967;">Local: {{localrecoveryDowntime}}
                                        ({{localrecoverycost}}) </br>Cloud: {{cloudrecoveryDowntime}}
                                        ({{cloudrecoverycost}}) </strong> <strong v-if="recoverytype === 'local'">({{localrecoverycost}})</strong>
                                    <strong v-if="recoverytype === 'cloud'">({{cloudrecoverycost}})</strong>
                                </h6>
                                <h6 v-else>Estimated Recovery Time & Loss:<br/> <strong style="color: #4d5967;">No
                                    Backup Taken</strong></h6>
                                <h6>
                                Provided Response Time: <br/><strong style="color: #4d5967;">{{recoveryhrs}} hrs
                                    {{recoverymins}} mins</strong> <strong>({{respondscost}})</strong></h6>

                                <h6 v-if="checked == ''"
                                    style="font-size: 14px;font-weight: 200;color: #9ba7b5; width:80%; margin-bottom: 33px; padding-top: 25px; border-top: 1px solid;">
                                    Estimated Downtime & Loss: <br/> <strong style="color: #4d5967; font-size:22px"
                                                                             v-if="recoverytype === 'local'">
                                    {{displaylocalDowntime }}</strong> <strong style="color: #4d5967; font-size:22px"
                                                                               v-else-if="recoverytype === 'cloud'"> {{
                                    displaycloudDowntime }}</strong> <strong style="color: #4d5967; font-size:22px"
                                                                             v-else> Local: {{displaylocalDowntime }}
                                    ({{ localdowntimecost}})<br/> Cloud: {{ displaycloudDowntime }} ({{clouddowntimecost
                                    }})</strong> <strong v-if="recoverytype === 'local'"> ({{
                                    localdowntimecost}})</strong> <strong v-else-if="recoverytype === 'cloud'">
                                    ({{clouddowntimecost }})</strong>
                                </h6>
                                <h6 v-else
                                    style="font-size: 14px;font-weight: 200;color: #9ba7b5; width:80%; margin-bottom: 33px; padding-top: 25px; border-top: 1px solid;">
                                    Estimated Downtime & Loss:<br/> <strong style="color: #4d5967;font-size: 22px;">Possible
                                    Business Closure</strong></h6>
                                <h6 style="
    font-size: 13px;
    width: 78%;
    color: rgba(255,120,120,1);
    " v-if="recoverytype === 'local'"><strong>Warning:</strong> Having local-only backups could leave you vulnerable to
                                    hardware failures, office fires, floods, or even theft. It's vital to have an offsite
                                    backup to protect <span v-if="mspcheck == 'msp'">your clients'</span><span
                                            v-else>your</span> business.</h6>


                            </div>
                            <div class="ttlwidth" v-else-if="checked == 'false'"></div>
                            <h6 v-else>Possible Business Closure</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div id="money" class="col-md-6 col-sm-12 PDFdatto">
                <h4 id="dattotitle">Datto SIRIS Solution</h4>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">Datto's SIRIS BCDR solutions allow you to backup as frequently as every 5 minutes. They also allow for regular testing and validation of your backups, reducing your risk even further.</span>
                    </div>
                    <div id="datto1">
                        <div>
                            <p class="restitle">Time between backups</p>
                            <h6>{{bcdrbackup}} mins</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">In case of a disaster, Datto can enable you to virtualize your backups, hosted in our cloud. On average, it only takes about {{bcdrrecovery}} minutes to access the Datto portal, find your backup copy, and to virtualize it.</span>
                    </div>
                    <div id="datto2">
                        <div>
                            <p class="restitle">Average Recovery Processing Time</p>
                            <h6>{{bcdrrecovery}} mins* <span>*Time to virtualization will vary depending on numerous factors, including, but not limited to, the size of the SIRIS device, the availability and speeds of other local resources, the number of applications you are running, and server load.</span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tooltip" onclick="return true">
                        <p class="icon">?</p>
                        <span class="tooltiptext">Downtime will always cost your business money. However, you can reduce it with a Datto business continuity/disaster recovery solution. Compared to your current solution, you could reduce your possible downtime losses by around <span
                                class="total" v-if="recoverytype === 'local'">{{ localcostsaving }}</span>
                    <span v-else>{{ cloudcostsaving }}</span> </span>
                    </div>
                    <div id="datto3">
                        <div>
                            <p style="margin-bottom: 20px; border-bottom: 1px solid;" class="restitle">Summary</p>
                            <h6>Estimated Recovery Time & Loss:<br/> <strong style="color: #4d5967;">{{bcdrrecovery}}
                                minutes</strong> <strong>({{dattorecoverycost}})</strong>
                            </h6>

                            <h6>
                            Provided Response Time: <br/><strong style="color: #4d5967;">{{recoveryhrs}} hrs
                                {{recoverymins}} mins</strong> <strong>({{respondscost}})</strong>
                            </h6>
                            <h6 style="font-size: 14px;font-weight: 200;color: #9ba7b5; width:80%; margin-bottom: 33px; padding-top: 25px; border-top: 1px solid;">
                                * Estimated Downtime & Loss: <br/><strong style="color: #4d5967; font-size:22px">{{displayBCDRDowntime}}</strong>
                                <strong>({{ bcdrdowntimecost }})</strong><br> <span
                                    style="margin: 0;font-style: normal; opacity: 1;" v-if="checked == ''">
                                    <strong class="total"
                                            style="margin-top: 10px;font-size: 20px;color: green;float: left;"
                                            v-if="recoverytype === 'local'">(-{{ localcostsaving }})</strong>
                                <strong style="margin-top: 10px;font-size: 20px;color: green;float: left;"
                                        v-if="recoverytype === 'cloud'">(-{{ cloudcostsaving }})</strong></span><span
                                    v-else style="float:left;width:100%;height:12px; "></span></h6>
                            <h6><span>*These figures are merely an estimation: They do not represent a calculation of the actual losses your business may face.</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="results" id="pdfmain">
            <div class="col-md-12 col-sm-12" id="results" class="PDFMain">
                <h2>How long can <span v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> business
                    survive?</h2>
                <div v-if="checked == ''">
                    <p>With the information that you've provided, and using certain assumptions made based on how
                        businesses today typically function, we have estimated <span v-if="mspcheck == 'msp'">your clients'</span><span
                                v-else>your</span> downtime losses to be <span class="hoverspan"><strong>{{displayhourlyRevenueCost}}
                            per hour</strong> <span class="hoverdetail">Calculation is made by taking Staff Salary, Overheads & Revenue and breaking that down to an hourly cost for a 40 week & 52 weeks of the year business, then multiplied by the number of staff.</span></span>.
                    </p>
                    <p>
                        With <span v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> current backup
                        and recovery solution, you could be looking at a estimated potential loss of around <span
                            class="hoverspan"><strong><span
                            v-if="recoverytype === 'local'">{{ localdowntimecost }}</span><span v-else>{{ clouddowntimecost }}</span></strong><span
                            class="hoverdetail">Hourly Cost ({{displayhourlyRevenueCost}}) * Estimated Downtime (<span
                            v-if="recoverytype === 'local'">{{ displaylocalDowntime }}</span><span v-else>{{ displaycloudDowntime }}</span>)</span></span>
                        over <strong><span v-if="recoverytype === 'local'">{{ displaylocalDowntime }}</span><span
                            v-else>{{ displaycloudDowntime }}</span></strong> of downtime. This is assuming that <span
                            v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> recovery process works
                        exactly as planned, and could be worse if you experience any further glitches. For this reason,
                        it's critical to regularly test <span
                            v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> recovery capabilities.
                        If the recovery process fails, <span v-if="mspcheck == 'msp'">your clients</span><span v-else>you</span>
                        could be looking at additional losses of


                        <span class="hoverspan"><strong>{{perbackupdowntime}}</strong> <span class="hoverdetail">Estimated Downtime Cost per hour ({{displayhourlyRevenueCost}}) * Time between Backups ({{backuphrs}}hrs {{backupmins}}mins)</span></span>

                        per recovery attempt. </p>
                </div>
                <div v-else-if="checked == 'false'">
                    <p>With the information that you've provided, and using certain assumptions made based on how
                        businesses today typically function, we have estimated <span v-if="mspcheck == 'msp'">your clients'</span><span
                                v-else>your</span> downtime losses to be <strong>{{displayhourlyRevenueCost}} per hour</strong>.</p>
                    <p>
                        With <span v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> current backup
                        & recovery solution you could be looking at an estimated potential loss of around <strong><span
                            v-if="recoverytype === 'local'">{{ localdowntimecost }}</span><span v-else>{{ clouddowntimecost }}</span></strong>
                        due to <strong><span v-if="recoverytype === 'local'">{{ displaylocalDowntime }}</span><span
                            v-else>{{ displaycloudDowntime }}</span></strong> of downtime. This is assuming that <span
                            v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> recovery process works
                        exactly as planned, and could be worse if you experience any further glitches. For this reason,
                        it's critical to regularly test <span v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span>
                        recovery capabilities. If the recovery process fails, <span v-if="mspcheck == 'msp'">your clients</span><span
                            v-else>you</span> could be looking at additional losses of
                        <strong>{{perbackupdowntime}}</strong> per recovery attempt. </p>
                </div>
                <div v-else>
                    <p>With the information that you've provided, we have identified that <span
                            v-if="mspcheck == 'msp'">your clients'</span><span v-else>your</span> estimated downtime
                        losses per hour would be <strong>{{displayhourlyRevenueCost}}</strong>. However, as a result of
                        not taking data backups the impact could be much worse! </p>
                </div>
                <h2 v-if="recoverytype === 'local'">Are your backups at risk?</h2>
                <p v-if="recoverytype === 'local'">Local backups should be a key part of your data protection
                    strategy<span v-if="mspcheck == 'msp'"> for your clients</span>. They allow you to recover data and
                    restore operations quickly in the event of a primary server outage, data deletion, or a ransomware
                    attack. However, local backup alone isn't enough. What happens if the local backup device is
                    destroyed or inaccessible due to a fire, flood, or other disaster? That's why you need a secondary,
                    offsite backup.</p>
                <h2 v-if="recoverytype === 'cloud'" style="margin-top:30px;float: left; width: 100%">Are your backups at
                    risk?</h2>
                <p v-if="recoverytype === 'cloud'">Cloud backup delivers that secondary, geographically isolated copy.
                    You might ask? Why do I need local backups at all? Well, restores from the cloud are slow. That’s
                    why the combination of onsite backups with cloud replication has become so popular among SMBs and
                    MSPs alike. You really need both—local for fast restores and cloud for disaster recovery. </p>

                <h2>How can you reduce your risk?</h2>
                <p><span v-if="mspcheck == 'msp'">In contrast,</span><span v-else>The first step is to talk to your IT service provider or MSP about Datto.</span>
                    Datto's SIRIS business continuity and disaster recovery (BCDR) solutions could reduce <span
                            v-if="mspcheck == 'msp'">your clients</span><span v-else>your</span> downtime to <strong>{{displayBCDRDowntime}}</strong>
                    and <span v-if="mspcheck == 'msp'">thier</span><span v-else>your</span> overall downtime cost to <strong>{{ bcdrdowntimecost }}</strong>. In the rare case that the first recovery attempt
                    doesn't work, your costs would only increase by <strong>{{perdattobackupdowntime}}</strong>, as
                    opposed to <strong v-if="checked == ''">{{perbackupdowntime}}</strong><strong
                            v-else-if="checked == 'false'">{{perbackupdowntime}}</strong><strong v-else>your businesses
                        closing all together</strong>.</p>

                <p>With Datto, even if you are experiencing an outage at your workplace, work doesn't have to stop.
                    Datto Continuity can get you back to business in as little as <strong>{{bcdrrecovery}}
                        minutes</strong> on virtual servers, which can be accessed anywhere you have working internet.
                    Features like ransomware detection and advanced backup verification let you rest easy knowing your
                    backups will work in your time of need.
            </div>
        </div>
    </section>
</div>

