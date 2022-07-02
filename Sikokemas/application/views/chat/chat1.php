<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title> Chat </title>		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style type="text/css">
				.chat{
					margin-top: auto;
					margin-bottom: auto;
				}
				.card{
					height: 500px;
					border-radius: 15px !important;
					background-color: rgba(0,0,0,0.4) !important;
				}
				.contacts_body{
					/*padding:  0.75rem 0 !important;*/
					overflow-y: auto;
					white-space: nowrap;
				}
				.msg_card_body{
					overflow-y: auto;
				}
				.card-header{
					border-radius: 15px 15px 0 0 !important;
					border-bottom: 0 !important;
				}
			 	.card-footer{
					border-radius: 0 0 15px 15px !important;
					border-top: 0 !important;
				}
				.container{
					align-content: center;
				}
				.type_msg{
					background-color: rgba(0,0,0,0.3) !important;
					border:0 !important;
					color:white !important;
					height: 60px !important;
					overflow-y: auto;
				}
				.type_msg:focus{
				    box-shadow:none !important;
		           	outline:0px !important;
				}
				.attach_btn{
					border-radius: 15px 0 0 15px !important;
					background-color: rgba(0,0,0,0.3) !important;
					border:0 !important;
					color: white !important;
					cursor: pointer;
				}
				.send_btn{
					border-radius: 0 15px 15px 0 !important;
					background-color: rgba(0,0,0,0.3) !important;
					border:0 !important;
					color: white !important;
					cursor: pointer;
				}
				.contacts{
					list-style: none;
					padding: 0;
				}
				.contacts li{
					width: 100% !important;
					padding: 5px 10px;
					margin-bottom: 15px !important;
				}
				.active{
					background-color: rgba(0,0,0,0.3);
				}
				.user_img{
					height: 70px;
					width: 70px;
					border:1.5px solid #f5f6fa;
				
				}
				.img_cont{
					position: relative;
					height: 70px;
					width: 70px;
				}
				.img_cont_msg{
					height: 40px;
					width: 40px;
				}
				.online_icon{
					position: absolute;
					height: 15px;
					width:15px;
					background-color: #4cd137;
					border-radius: 50%;
					bottom: 0.2em;
					right: 0.4em;
					border:1.5px solid white;
				}
				.user_info{
					margin-top: auto;
					margin-bottom: auto;
					margin-left: 15px;
				}
				.user_info span{
					font-size: 20px;
					color: white;
				}
				.user_info p{
					font-size: 10px;
					color: rgba(255,255,255,0.6);
				}
				.msg_cotainer{
					margin-top: auto;
					margin-bottom: auto;
					margin-left: 10px;
					border-radius: 25px;
					background-color: #82ccdd;
					padding: 10px;
					position: relative;
				}
				.msg_cotainer_send{
					margin-top: auto;
					margin-bottom: auto;
					margin-right: 10px;
					border-radius: 25px;
					background-color: #78e08f;
					padding: 10px;
					position: relative;
				}
				.msg_time{
					position: absolute;
					left: 0;
					bottom: -15px;
					color: rgba(255,255,255,0.5);
					font-size: 10px;
				}
				.msg_time_send{
					position: absolute;
					right:0;
					bottom: -15px;
					color: rgba(255,255,255,0.5);
					font-size: 10px;
				}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xs-4 col-sm-4 col-md-4 col-xl-3 chat">
					<div class="card mb-sm-3 mb-md-0 contacts_card">
						<div class="card-body contacts_body">
							<ui class="contacts">
								
								<!-- List Contact -->
									<?php foreach($list_contact as $r) : ?>
										<li class="active">
											<a href="<?= base_url ?>chat/as/<?= $id ?>/<?= $r['id'] ?>">
												<div class="d-flex bd-highlight">
													<div class="img_cont">
														<h1 class="rounded-circle user_img"> &nbsp;<i class="fa fa-users"></i></h1>
														<span class="online_icon"></span>
													</div>
													<div class="user_info">
														<span><?= $r['nama'] ?></span>
														<p><?= $r['nama'] ?> is online</p>
													</div>
												</div>
											</a>
										</li>
									<?php endforeach; ?>
								<!-- ! List Contact -->

							</ui>
						</div>
					</div>
				</div>

				<div class="col-xs-8 col-sm-8 col-md-8 col-xl-6 chat">
					<div class="card">
						
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<div class="rounded-circle user_img text-center">
										<h1><i class="fa fa-user"></i></h1>
									</div>
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<?php if($id2 !== null) : ?>
										<span>Chat with <?= $contact_detail['nama'] ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="card-body msg_card_body" id="chat">
							<?php if($id2 === null) : ?>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer">
										Start your chat now
									</div>
								</div>
							<?php else: ?>
								<!-- Chat list -->
								<?php if(!empty($chat)) : ?>
									<?php foreach($chat as $chat) : ?>
										<div class="d-flex <?= ($chat['sender_id'] == $data['id']) ? 'justify-content-end' : 'justify-content-start' ?> mb-4">
											<div class="<?= ($chat['sender_id'] == $data['id']) ? 'msg_cotainer_send' : 'msg_cotainer' ?>">
												<?= $chat['message'] ?>
												<span class="<?= ($chat['sender_id'] == $data['id']) ? 'msg_time_send' : 'msg_time' ?>"><?= $chat['created_at'] ?></span>
											</div>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
								<?php endif; ?>
								<!-- !Chat list -->
							<?php endif; ?>						
						</div>

						<div class="card-footer">
							<form id="form">
								<div class="input-group">
									<?php if($id2 !== null) : ?>
											<div class="input-group-append">
												<span class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
											</div>
											<input id="message" class="form-control type_msg" placeholder="Type your message..."></input>
											<div class="input-group-append">
												<button class="input-group-text send_btn" type="submit">
													<i class="fa fa-location-arrow"></i>
												</button>
											</div>
									<?php endif; ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
	<!-- MYSQL TIME STAMP -->
	<script type="text/javascript">
		// MYSQL TIME FORMAT
        function twoDigits(d) {
		    if(0 <= d && d < 10) return "0" + d.toString();
		    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
		    return d.toString();
		}

		/**
		 * …and then create the method to output the date string as desired.
		 * Some people hate using prototypes this way, but if you are going
		 * to apply this to more than one Date object, having it as a prototype
		 * makes sense.
		 **/
		Date.prototype.toMysqlFormat = function() {
		    return this.getUTCFullYear() + "-" + twoDigits(1 + this.getUTCMonth()) + "-" + twoDigits(this.getUTCDate()) + " " + twoDigits(this.getUTCHours()) + ":" + twoDigits(this.getUTCMinutes()) + ":" + twoDigits(this.getUTCSeconds());
		};
	</script>

	<!-- PUSHER -->
	<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
	
	<script type="text/javascript">
		// WEB SOCEKT API
		const sender_id 		= <?= $data['id'] ?>;
		const receiver_id 		= <?= $data['id2'] ?>;
		const room_id 			= <?= $data['room_id'] ?>;
		const date 				= new Date().toMysqlFormat()

		// Pusher api
        const pusher  			= new Pusher('< API KEY YANG ADA DI PUSHER.COM >', 
        {
            cluster: 'ap1'
        })

        const socket  			= pusher.subscribe('chat')

        // HTML CHAT
        const chat_html 		= document.getElementById('chat')
        const form 				= document.getElementById('form')

        // Pesan datang
        socket.bind('pesan-datang', (data) =>
        {
        	if(data.room_id == room_id)
        	{
	            if(data.receiver_id == sender_id)
	            {
	            	// Card
	            	let card  		= document.createElement('div')
	            	card.classList.add('d-flex')
	            	card.classList.add('justify-content-start')
	            	card.classList.add('mb-4')

	            	// Message Container
	            	let message 	= document.createElement('div')
	            	message.classList.add('msg_cotainer')

	            	message.appendChild(document.createTextNode(data.message))
	            	
	            	// Span 
	            	let span 		= document.createElement('span')
	            	span.classList.add('msg_time')

	            	span.appendChild(document.createTextNode(date))

	            	// Jadi deh
	            	message.appendChild(span)
	            	card.appendChild(message)
	            	chat_html.appendChild(card)
	            }
        	}
        })

        // Send message
        form.addEventListener('submit', (ev) =>
        {
        	ev.preventDefault()

        	let message_value 	= document.getElementById('message')
        	message_value 		= message_value.value

		   	let fd 				= new FormData()
			fd.append('room_id', room_id);
			fd.append('sender_id', sender_id)
			fd.append('receiver_id', receiver_id)
			fd.append('message', message_value)

        	fetch('<?= base_url ?>chat/send_chat',
			{
				method: 'POST',
				body: fd
			})
			.then(res 	=> res.json())
			.then(data 	=>
			{
				// Card
            	let card  		= document.createElement('div')
            	card.classList.add('d-flex')
            	card.classList.add('justify-content-end')
            	card.classList.add('mb-4')

            	// Message Container
            	let message 	= document.createElement('div')
            	message.classList.add('msg_cotainer_send')

            	message.appendChild(document.createTextNode(message_value))
            	
            	// Span 
            	let span 		= document.createElement('span')
            	span.classList.add('msg_time_send')

            	span.appendChild(document.createTextNode(date))

            	// Jadi deh
            	message.appendChild(span)
            	card.appendChild(message)
            	chat_html.appendChild(card)
			})
        })

	</script>
</html>
