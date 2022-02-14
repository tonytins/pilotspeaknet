using Microsoft.AspNetCore;
using PilotSpeak.Server;

var host = WebHost.CreateDefaultBuilder(args)
    .UseStartup<Startup>()
    .Build();

host.Run();
