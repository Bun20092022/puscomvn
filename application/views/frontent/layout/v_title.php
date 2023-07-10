<?php
$website = $this->session->userdata('ss_website');
if(isset($website)){
    $this->id_website = $website['id_website'];
}else{
    $this->id_website = 1;
}
$viewinfo = $this->db->select('*')->from('qh_website')->where('id',$this->id_website)->get()->row_array();
$info = json_decode($viewinfo['seo']);
?>
<?php if(isset($title)){ ?>
    <title><?php echo $title; ?></title>
<?php }else{ ?>
    <title><?php echo $info->{'title'}; ?></title>
<?php } ?>
<?php if(isset($description)){ ?>
    <meta name="description" content="<?php echo $description; ?>" />
<?php }else{ ?>
    <name="description" content="<?php echo $info->{'description'}; ?>" />
    <?php } ?>
    <?php if(isset($keywords)){ ?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
    <?php }else{ ?>
        <meta name="keywords" content="<?php echo $info->{'keywords'}; ?>" />
    <?php } ?>
    <?php if(isset($title)){ ?>
        <meta name="og:title" content="<?php echo $title; ?>" />
    <?php }else{ ?>
        <meta name="og:title" content="<?php echo $info->{'title'}; ?>" />
    <?php } ?>
    <?php if(isset($description)){ ?>
        <meta name="og:description" content="<?php echo $description; ?>" />
    <?php }else{ ?>
        <meta name="og:description" content="<?php echo $info->{'description'}; ?>" />
    <?php } ?>
    <?php if(isset($imgsocial)){ ?>
        <meta name="og:image" content="<?php echo $imgsocial; ?>" />
    <?php }else{ ?>
        <meta name="og:image" content="<?php echo $info->{'imgsocial'}; ?>" />
    <?php } ?>
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo $info->{'title'}; ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo $info->{'favicon'}; ?>">
</script>