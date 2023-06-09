"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.ScanTypeSelector = void 0;
var core_1 = require("../../core");
var ScanTypeSelector = (function () {
    function ScanTypeSelector(supportedScanTypes) {
        this.supportedScanTypes = this.validateAndReturnScanTypes(supportedScanTypes);
    }
    ScanTypeSelector.prototype.getDefaultScanType = function () {
        return this.supportedScanTypes[0];
    };
    ScanTypeSelector.prototype.hasMoreThanOneScanType = function () {
        return this.supportedScanTypes.length > 1;
    };
    ScanTypeSelector.prototype.isCameraScanRequired = function () {
        for (var _i = 0, _a = this.supportedScanTypes; _i < _a.length; _i++) {
            var scanType = _a[_i];
            if (ScanTypeSelector.isCameraScanType(scanType)) {
                return true;
            }
        }
        return false;
    };
    ScanTypeSelector.isCameraScanType = function (scanType) {
        return scanType === core_1.Html5QrcodeScanType.SCAN_TYPE_CAMERA;
    };
    ScanTypeSelector.isFileScanType = function (scanType) {
        return scanType === core_1.Html5QrcodeScanType.SCAN_TYPE_FILE;
    };
    ScanTypeSelector.prototype.validateAndReturnScanTypes = function (supportedScanTypes) {
        if (!supportedScanTypes || supportedScanTypes.length === 0) {
            return core_1.Html5QrcodeConstants.DEFAULT_SUPPORTED_SCAN_TYPE;
        }
        var maxExpectedValues = core_1.Html5QrcodeConstants.DEFAULT_SUPPORTED_SCAN_TYPE.length;
        if (supportedScanTypes.length > maxExpectedValues) {
            throw "Max ".concat(maxExpectedValues, " values expected for ")
                + "supportedScanTypes";
        }
        for (var _i = 0, supportedScanTypes_1 = supportedScanTypes; _i < supportedScanTypes_1.length; _i++) {
            var scanType = supportedScanTypes_1[_i];
            if (!core_1.Html5QrcodeConstants.DEFAULT_SUPPORTED_SCAN_TYPE
                .includes(scanType)) {
                throw "Unsupported scan type ".concat(scanType);
            }
        }
        return supportedScanTypes;
    };
    return ScanTypeSelector;
}());
exports.ScanTypeSelector = ScanTypeSelector;
//# sourceMappingURL=scan-type-selector.js.map