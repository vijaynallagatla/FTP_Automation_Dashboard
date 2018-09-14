<!DOCTYPE HTML>
<html>
   <head>
	<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
      <script type="text/javascript">
         function WebSocketTest(){
         // Host we are connecting to
			var net = new WebTCP('tcp://10.184.2.53', 8798);
			var socket = net.createSocket('tcp://10.184.2.53', 8798);
			socket.write("hello world");
         }
      </script>
   </head>
   <body>
      
   </body>
</html>