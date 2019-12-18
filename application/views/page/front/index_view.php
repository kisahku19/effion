<!-- <div role="main" class="slider-wrap">
	<div class="slider-wrap-inner">
		<div class="slider-container">
			<div class="slider" id="revolutionSlider">
				<ul>
				 	<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >
						<img src="assets/images/y9.gif" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" alt="">
						<div class="tp-caption top-label lfl stl"
							 data-x="10"
							 data-y="180"
							 data-speed="300"
							 data-start="500"
							 data-easing="easeOutExpo" style="color:#E0FF33;">Welcome to</div>

						<div class="tp-caption sft stb visible-lg"
							 data-x="352"
							 data-y="185"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo"><img src="assets/images/tes1.gif" alt=""></div>

						<div class="tp-caption main-label sft stb"
							 data-x="10"
							 data-y="210"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo" style="font-family:Bitter;color:#E0FF33;">EFFION</div>

						<div class="tp-caption bottom-label sft stb"
							 data-x="115"
							 data-y="280"
							 data-speed="500"
							 data-start="1500"
							 data-easing="easeOutExpo" style="color:#FB1105;">EFFION CREATOR COMMUNITY.</div>
					</li>
					<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >
						<img src="assets/images/y10.gif" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" alt="">
						<div class="tp-caption top-label lfl stl"
							 data-x="10"
							 data-y="180"
							 data-speed="300"
							 data-start="500"
							 data-easing="easeOutExpo" style="color:#4bd0ea;">Mau Jadi</div>

						<div class="tp-caption sft stb visible-lg"
							 data-x="352"
							 data-y="185"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo"><img src="assets/images/y12.gif" alt=""></div>

						<div class="tp-caption main-label sft stb"
							 data-x="10"
							 data-y="210"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo" style="font-family:Bitter;color:#FFFFFF;">YOUTUBER?</div>

						<div class="tp-caption bottom-label sft stb"
							 data-x="115"
							 data-y="280"
							 data-speed="500"
							 data-start="1500"
							 data-easing="easeOutExpo" style="color:#FFFFFF;">YUK GABUNG SINI.</div>
					</li>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div> -->
<!-- Slider - Revolution -->


<div class="row" style="padding-top: 30px;">
    <?php
    foreach ($all_event as $value) { ?>
        <div class="col-md-6">
            <div class="row"><br>
                <div class="col-md-6"><img src="<?= base_url() ?>foto_event/<?= $value->gambar ?>" alt="" class="img img-responsive" style="width: 120%; height: 240px;"></div>
                <div class="col-md-6">
                    <h2 class="title text-blue-400"><a href="<?= base_url()?>front/detail_event/<?= $value->id_event?>"><?= $value->nama_event?></a></h2><br>
                     
                    <div class="wy-text-large">
                        <?= date("d-m-Y", strtotime( $value->tanggal)) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
?>
</div>