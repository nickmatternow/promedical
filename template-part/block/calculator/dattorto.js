var calculator = new Vue({
    el: '#calculator',
    data: {
        mspcheck: 'enduser',
        currencyicon: '$',
        accesshours: '72',
        productiontime: '12',
        datagb: '2000',
        backuphrs: '12',
        backupmins: '00',
        recoveryhrs: '0',
        recoverymins: '30',
        local: '0',
        cloud: '0',
        localspeed: '500',//MB/s
        cloudspeed: '70', //Mbps
        staff: '40',
        staffrevenue: '5000000',
        staffwage: '25000',
        staffoverhead: '10000',
        staffrevenueedit: '5000000',
        staffwageedit: '25000',
        staffoverheadedit: '10000',
        localrecoveryDowntime: '0',
        cloudrecoveryDowntime: '0',
        localdowntimecost: '0',
        clouddowntimecost: '0',
        hourlyRevenueCost: '0',
        localestimatedDowntime: '0',
        displaylocalDowntime: '0',
        cloudestimatedDowntime: '0',
        displaycloudDowntime: '0',
        recoverytype: 'local',
        displayhourlyRevenueCost: '0',
        bcdrbackup: '5',
        bcdrrecovery: '6',
        bcdrestimateddowntime: '0',
        bcdrdowntimecost: '0',
        localrecoverycost: '0',
        cloudrecoverycost: '0',
        displayBCDRDowntime: '0',
        cloudcostsaving: '0',
        localcostsaving: '0',
        perbackupdowntime: '0',
        perdattobackupdowntime: '0',
        checked: '',
        dattorecoverycost: '',
        respondscost: '',
        localbusinessrisk: '',
        cloudbusinessrisk: '',
        responsetime:'',
        formsubmit: 'Requested BCDR Demo from RTO Calculator. Inputs were as follows:, Data = {{datagb}}, Staff = {{staff}}, Annual Revenue = {{staffrevenue}}, Results: Current Solution: Time between backups {{backuphrs}}hrs {{backupmins}}mins, Recovery Processing Time: Local = {{localrecoveryDowntime}} / Cloud = {{cloudrecoveryDowntime}}, Minimum Downtime: Local = {{ displaylocalDowntime }} / Cloud = {{ displaycloudDowntime }} // ',
    },
    computed: {
        staffrevenueedit: function () {
            var edited = this.staffrevenue;
            return edited;
        },
        staffoverheadedit: function () {
            var edited = this.staffoverhead;
            return edited;
        },
        staffwageedit: function () {
            var edited = this.staffwage;
            return edited;
        },
        hourlyRevenueCost: function () {
            return parseInt(this.staff) * ((this.staffwageedit / 40) / 52) + ((this.staffoverheadedit / 40) / 52) + ((this.staffrevenueedit/ 40) / 52);
        },
        displayhourlyRevenueCost: function () {
            return this.currencyicon + currencyFormat(this.hourlyRevenueCost);
        },
        localestimatedDowntime: function () {
            return 8388608 * parseInt(this.datagb) / (parseInt(this.localspeed) * 1024) + (((parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60)
        },
        cloudestimatedDowntime: function () {
            return 8388608 * parseInt(this.datagb) / (parseInt(this.cloudspeed) * 1024) + (((parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60)
        },
        bcdrestimatedDowntime: function () {
            return (((parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60) + parseInt(this.bcdrrecovery)
        },
        localrecoveryDowntime: function () {
            var time = Math.round((8388608 * parseInt(this.datagb) / (parseInt(this.localspeed) * 1024))/60);
            return timeConvert(time);
        },
        cloudrecoveryDowntime: function () {
            var time = Math.round((8388608 * parseInt(this.datagb) / (parseInt(this.cloudspeed) * 1024))/60);
            return timeConvert(time);
        },
        localrecoverycost: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (8388608 * parseInt(this.datagb) / (parseInt(this.localspeed) * 1024) / 3600)) || 0;
            return this.currencyicon + currencyFormat(cost);
        },
        cloudrecoverycost: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (8388608 * parseInt(this.datagb) / (parseInt(this.cloudspeed) * 1024) / 3600)) || 0;
            return this.currencyicon + currencyFormat(cost);
        },
        localdowntimecost: function(e){
            var cost = Math.ceil( parseInt(this.hourlyRevenueCost) * (parseInt(this.localestimatedDowntime) / 3600)) || 0;
            return this.currencyicon + currencyFormat(cost);
        },
        clouddowntimecost: function(e){
            var cost = Math.ceil( parseInt(this.hourlyRevenueCost) * (parseInt(this.cloudestimatedDowntime) / 3600)) || 0;
            return this.currencyicon + currencyFormat(cost);
        },
        bcdrdowntimecost: function(e){
            var cost = Math.ceil(parseInt(this.hourlyRevenueCost) * ((this.bcdrrecovery / 60) + (parseInt(this.recoveryhrs) + parseInt(this.recoverymins) / 60)));
            return this.currencyicon + currencyFormat(cost);
        },
        cloudcostsaving: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (this.bcdrrecovery / 60)) || 0;
            var cost2 = Math.round( parseInt(this.hourlyRevenueCost) * (8388608 * parseInt(this.datagb) / (parseInt(this.cloudspeed) * 1024) / 3600)) || 0;
            var cost3 = cost2 - cost;
            return this.currencyicon + currencyFormat(cost3);
        },
        localcostsaving: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (this.bcdrrecovery / 60)) || 0;
            var cost2 = Math.round( parseInt(this.hourlyRevenueCost) * (8388608 * parseInt(this.datagb) / (parseInt(this.localspeed) * 1024) / 3600)) || 0;
            var cost3 = cost2 - cost;
            return this.currencyicon + currencyFormat(cost3);
        },
        displaylocalDowntime: function () {
            var time = Math.round(((8388608 * parseInt(this.datagb) / (parseInt(this.localspeed) * 1024) + (((parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60))/60));
            return timeConvert(time);
        },
        displaycloudDowntime: function () {
            var time = Math.round(((8388608 * parseInt(this.datagb) / (parseInt(this.cloudspeed) * 1024) + (((parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60))/60));
            return timeConvert(time);
        },
        displayBCDRDowntime: function () {
            var time = Math.round(((( parseInt(this.bcdrrecovery) + parseInt(this.recoveryhrs)*60) + (parseInt(this.recoverymins)))*60)/60);
            return timeConvert(time);
        },
        perbackupdowntime: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (parseInt(this.backuphrs) + parseInt(this.backupmins) / 60)) ;
            return this.currencyicon + currencyFormat(cost);
        },
        respondscost: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (parseInt(this.recoveryhrs) + parseInt(this.recoverymins) / 60)) ;
            return this.currencyicon + currencyFormat(cost);
        },
        perdattobackupdowntime: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (this.bcdrbackup / 60)) ;
            return this.currencyicon + currencyFormat(cost);
        },
        dattorecoverycost: function(e){
            var cost = Math.round( parseInt(this.hourlyRevenueCost) * (this.bcdrrecovery / 60)) ;
            return this.currencyicon + currencyFormat(cost);
        },
        localbusinessrisk: function(e){
            var cost = (parseInt(this.localrecoveryDowntime) / 3600) / this.accesshours
            if (cost > 0.8) {
                return 'Critical';
            } else if (cost > 0.6) {
                return 'Warning';
            } else {
                return 'Accept';
            }
        },
        cloudbusinessrisk: function(e){
            var cost = (parseInt(this.cloudrecoveryDowntime) / 3600) / this.accesshours
            if (cost > 0.8) {
                return 'Critical';
            } else if (cost > 0.6) {
                return 'Warning';
            } else {
                return 'Accept';
            }
        },
        responsetime: function(e){
            var cost = this.recoveryhrs
            if (cost > 5) {
                return 'Critical';
            }else {
                return 'Accept';
            }
        },


    }
});
function currencyFormat (num) {
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
function RemoveRougeChar(convertString){
    if(convertString.substring(0,1) == ","){
        return convertString.substring(1, convertString.length)
    }
    return convertString;
}
function timeConvert(n) {
    var num = n;
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return rhours + "hrs " + rminutes + "mins";
}