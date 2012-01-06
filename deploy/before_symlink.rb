current_release = release_pat

node[:deploy].each do |application, deploy|

  execute "php bin/vendors update" do
    user "deploy"
    cwd current_release
    command "php bin/vendors update"
    action :run
  end

  execute "clearing the symfony app cache" do
    user "deploy"
    cwd current_release
    command "php app/console cache:clear --env=scalarium"
    action :run
  end

  execute "execute db migrations" do
    user "deploy"
    cwd current_release
    command "php app/console doctrine:migrations:migrate --no-interaction --env=scalarium"
    action :run
  end

  execute "installing assets" do
    user "deploy"
    cwd current_release
    command "php app/console assets:install web --env=scalarium"
    action :run
  end

  execute "chown app cache and log dirs to deploy:www-data" do
    user "root"
    cwd current_release
    command "mkdir -p app/cache; chown -R deploy:www-data app/cache; chown -R deploy:www-data app/logs; find app/cache -type d | xargs -r chmod 0770; find app/cache -type f | xargs -r chmod 0660; find app/logs -type d | xargs -r chmod 0770; find app/logs -type f | xargs -r chmod 0660;"
    action :run
  end

end
