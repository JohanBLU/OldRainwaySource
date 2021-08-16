using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;

namespace RainwayLauncher
{
    class Program
    {
        static void Join(string JoinScriptUrl)
        {
            string Client = "C:\\Rainway\\RainwayClient.exe";
            string Arguments = "-script \"wait(); dofile('" + JoinScriptUrl + "')\"";
            Process.Start(Client, Arguments);
        }

        static void Error(string msg)
        {
            Console.Title = "Rainway Launcher [Beta]";
            Console.ForegroundColor = ConsoleColor.Red;
            Console.WriteLine(msg);
            Console.ReadLine();
            System.Threading.Thread.Sleep(3000);
            Environment.Exit(0);
        }

        static void Main(string[] args)
        {
            if (args.Length == 0) { Error("Invalid Parameters!"); }
            string URI = Uri.UnescapeDataString(args[0]).Replace("/", "").Replace("rainway:", "");
            string[] Flarf = URI.Split('|');
            Console.Title = "Rainway Launcher [Beta]"; //Flarf is cool
            Console.ForegroundColor = ConsoleColor.Blue;
            Console.WriteLine("Joining Game...");
            System.Threading.Thread.Sleep(1500);
            Console.WriteLine("Logging in...");
            System.Threading.Thread.Sleep(1500);
            Join("http://www.rn1host.ml/game/join.php?ip=" + Flarf[0] + "&port=" + Flarf[1] + "&name=" + Flarf[2] + "&id=" + Flarf[3] + "&PlaceID=" + Flarf[4] + "");
            Console.WriteLine("Game Launched!");
            System.Threading.Thread.Sleep(3500);
            Environment.Exit(0);
            Console.ReadLine();
        }
    }
}
