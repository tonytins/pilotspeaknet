namespace PilotSpeak.Server;

class Startup
{
    public void ConfigureServices(IServiceCollection services)
    {
        // Adds a default in-memory implementation of IDistributedCache.
        services.AddDistributedMemoryCache();

        services.AddSession(opt =>
        {
            opt.IdleTimeout = TimeSpan.FromMinutes(30);
            opt.Cookie.HttpOnly = true;
        });

        services.AddPhp(opt =>
        {

        });
    }

    public void Configure(IApplicationBuilder app, IWebHostEnvironment env)
    {
        if (env.IsDevelopment())
            app.UseDeveloperExceptionPage();

        app.UseSession();
        app.UsePhp();
        app.UseDefaultFiles();
        app.UseStaticFiles();
    }
}