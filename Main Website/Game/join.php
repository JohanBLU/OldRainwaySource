<?php 
	$mysqli = new mysqli("server306.web-hosting.com","rainmfma_rainway","H[-&6tapRsY0","rainmfma_database");
	global $mysqli;	
$placeid = $_GET['PlaceID'];
$id = $_GET['id'];
$joincheck = $mysqli->query("SELECT * FROM `accounts` WHERE `id`='$id'");
$join = $joincheck->fetch_array();

$gamequery = $mysqli->query("SELECT * FROM `games` WHERE `id`='$placeid'");
$game = $gamequery->fetch_array();
?>
local server = "<?php echo $game['ip'] ; ?>" 
local serverport = <?php echo $game['port'] ; ?> 
local playerName = "<?php echo $join['Username'] ; ?>" 
local playerId = <?php echo $join['id'] ; ?> 
PlayerCharApp = "" 
visit = game:GetService("Visit") 
function onDisconnection(peer, lostConnection) 
	if lostConnection then 
		game:SetMessage("You have lost the connection to the game", "LostConnection", "LostConnection") 
	else 
		game:SetMessage("This game has shut down", "Kick", "Kick") 
	end 
end 
function failed(peer, errcode, why) 
	dieerror("Failed to connect to the Game.") 
end 
function rejected() 
	dieerror("Connection rejected by the server.") 
end 
	game.GuiRoot.MainMenu["Tools"]:Remove();
	game.GuiRoot.MainMenu["Insert"]:Remove()
idled = false 
function onPlayerIdled(time) 
	if time  then 
		game:SetMessage(string.format("You were disconnected for being idle d minutes", time/60), "Idle", "Idle") 
		client:Disconnect() 
		if not idled then 
			idled = true 
		end 
	end 
end 
local suc, err = pcall(function() 
	game:SetMessage("Connecting to Server") 
	client = game:GetService("NetworkClient") 
	player = game:GetService("Players"):CreateLocalPlayer(0) 
	player.Name = playerName 
        player.CharacterAppearance = PlayerCharApp 
	player.userId = playerId 
pcall(function() game:GetService("Players"):SetChatStyle(Enum.ChatStyle.ClassicAndBubble) end) 
	client.ConnectionAccepted:connect(function(ip,replicator) 
		replicator:SendMarker().Received:connect(function() 
			game:ClearMessage() 
			while game:service("RunService").Stepped:wait() do 
				replicator:SendMarker() 
			end 
		end) 
		replicator.Disconnection:connect(onDisconnection) 
	end) 
end) 
if not suc then 
	dieerror(err) 
end 
function connected(url, replicator) 
	local suc, err = pcall(function() 
		game:SetMessageBrickCount() 
		local marker = replicator:SendMarker() 
	end) 
	if not suc then 
		dieerror(err) 
	end 
	marker.Recieved:wait() 
	local suc, err = pcall(function() 
		game:ClearMessage() 
	end) 
	if not suc then 
		dieerror(err) 
	end 
end 
local suc, err = pcall(function() 
	client.ConnectionAccepted:connect(connected) 
	client.ConnectionRejected:connect(rejected) 
	client.ConnectionFailed:connect(failed) 
	client:Connect(server, serverport, 0, 20) 
end) 
if not suc then 
	local x = Instance.new("Message") 
	x.Text = err 
	x.Parent = workspace 
	wait(math.huge) 
end 
while true do 
	wait(0.001) 
	replicator:SendMarker() 
end 