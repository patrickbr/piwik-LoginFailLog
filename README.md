# Piwik LoginFailLog Plugin

## Description

This simple plugin enables logging of failed authentication attempts in Piwik, nothing more, nothing less. Failed login attempts are logged like this:

```
WARNING LoginFailLog[2017-07-22 23:35:20] [b215d] Failed login from 172.217.22.227 'patrick'.
WARNING LoginFailLog[2017-07-22 23:35:20] [b215d] Failed login from 172.217.22.227 with username 'patrick'.
```

This is extremely useful if you want to secure your Piwik instance with fail2ban or similar tools that work on log files. For example, the following filter can be used with fail2ban to detect and count login fails:

```
# Fail2Ban configuration file for Piwik with LoginFailLog plugin

[Definition]
failregex = .* Failed login from <HOST> with username .*
```

## Incompatibility problems because of Piwik UTC logging

By default, Piwik logs everything in UTC time. This is not configurable and may cause problems with fail2ban. If your fail2ban jail does not work, *try increasing the `findtime` option in your jail by the offset between your local timezone and UTC*.

## License

GPL v3 or later
