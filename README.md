# PilotSpeak.NET

[![GitHub license](https://img.shields.io/github/license/tonytins/pilotspeaknet)](https://github.com/tonytins/pilotspeaknet/blob/master/LICENSE)

Created by Shawn McHenry, Pilot Speak is a phrase generator for talking like a pilot. This was ported over to .NET using [PeachPie](https://www.peachpie.io/) as a fun little experiment.

## Build Status

| Service   | Status                                                                                                                |
| --------- | --------------------------------------------------------------------------------------------------------------------- |
| Github    | ![.NET Core](https://github.com/tonytins/pilotspeaknet/workflows/.NET%20Core/badge.svg)                                    |
| Travis CI | [![Build Status](https://travis-ci.org/tonytins/pilotspeaknet.svg?branch=master)](https://travis-ci.org/tonytins/pilotspeaknet) |

## Phrase examples
> **The night recurrent on my check ride while based in NY was in question by my chief pilot.**

> **The crew meals on the 737 MAX during my last trip was super f^$ked up.**

> **The reserve trips on the 737 last month was against ALPA regulations.**

## How it works
Simply chooses random words from several pre-defined arrays and piecing them together using `array_rand()`. Also uses some javascript to copy text to the users clipboard via a button press. Keeps track of usage via a flat file `totalgens.txt` via  a `intval()` function.

A live version of this project can be found @ https://drraccoon.me/pilot/

## Requirements

### Prerequisites

* .NET Core 3.1 SDK
* PeachPie extension for [Visual Studio](https://marketplace.visualstudio.com/items?itemName=iolevel.peachpie-vs) or [VS Code](https://marketplace.visualstudio.com/items?itemName=iolevel.peachpie-vscode) (Optional)

## Authors

- **Anthony Leland** - *.NET Port* - [tonytins](https://github.com/tonytins)
- **Shawn McHenry** - *Initial work* - [drraccoony](https://github.com/drraccoony)

## License

This project is licensed under the GPL v2 license - see the [LICENSE](LICENSE) file for details.
