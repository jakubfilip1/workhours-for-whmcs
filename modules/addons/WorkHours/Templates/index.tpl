{if $WorkHoursParams['isEmployeeCurrentlyAtWork']}
    <form method="GET" action="addonmodules.php">
        <input type="hidden" name="module" value="WorkHours">
        <input type="hidden" name="controller" value="IndexController">
        <input type="hidden" name="action" value="endWork">
        <input type="submit" class="btn btn-primary" value="End Work">
    </form>
{else}
    <form method="GET" action="addonmodules.php">
        <input type="hidden" name="module" value="WorkHours">
        <input type="hidden" name="controller" value="IndexController">
        <input type="hidden" name="action" value="startWork">
        <input type="submit" class="btn btn-primary" value="Start Work">
    </form>
{/if}