local hasLoaded = false 
function character() 
local player = game.Workspace:FindFirstChild("OHNOES") 
if player~=nil and hasLoaded == false then 
wait(1) 
player.Head.BrickColor = BrickColor.new("Light orange") 
player.Torso.BrickColor = BrickColor.new("Light orange") 
player["Right Leg"].BrickColor = BrickColor.new("Light orange") 
player["Right Arm"].BrickColor = BrickColor.new("Light orange") 
player["Left Leg"].BrickColor = BrickColor.new("Light orange") 
player["Left Arm"].BrickColor = BrickColor.new("Light orange") 
local Shirt = Instance.new("Shirt", player) 
Shirt.ShirtTemplate = "http://www.rn1host.ml/Assets/shirts/BluesteelSuitShirt.png" 
local Pants = Instance.new("Pants", player) 
Pants.PantsTemplate = "http://www.rn1host.ml/Assets/pants/BluesteelSuitPants.png" 
player.Head.face.Texture = "http://www.rn1host.ml/Assets/faces/EpicFace.png" 
if not player:FindFirstChild("trolling") then 
game:Load('http://www.rn1host.ml/Assets/hats/BluesteelDominoCrown.rbxm') 
game["BluesteelDominoCrown"].Handle.Mesh.MeshId = "http://www.rn1host.ml/Assets/hats/meshlinks/BluesteelDominoCrown.mesh" 
-- that wasnt required flarf -energycell 
game["BluesteelDominoCrown"].Parent = player 
end 
Instance.new("StringValue",player).Name = "trolling" 
player.Humanoid.Died:connect(function() 
   if hasLoaded == true then 
       wait(5) 
       hasLoaded = false 
   end 
end) 
hasLoaded = true 
end 
end 
workspace.ChildAdded:connect(character) 
